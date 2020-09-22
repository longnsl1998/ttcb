<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (!empty($page_title)) echo $page_title; else echo "Trang chủ" ?></title>
    <base href="<?php echo public_url('')?>/">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="fontend/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="fontend/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="fontend/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="fontend/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="fontend/assets/dest/css/style.css">
	<link rel="stylesheet" href="fontend/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="fontend/assets/dest/css/huong-style.css">
    <link href="assets/plugins/toastr/css/toastr.min.css" rel="stylesheet">
    <link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    
	<style>
		.text-danger{
			color:red;
			font-size: 11px
		}
		#password{
			width: 100%;
			border: 1px solid #e1e1e1;
			height: 37px;
			padding: 0 12px;

		}
        .info p{
            font-size: 16px;
        }
        .info p img{
            width: 100%;
        }
        
        .col-sm-8 a{
            width: 122px;
             height: 35px;
             padding: .2em .6em .3em;
            border-radius: .25em;
        }
        .label{
       font-size:150%;
       font-weight: 400;
       padding: .3em .6em .1em;
            }
        .label-order .label{
            font-size:100%;
       font-weight: 400;
       padding: .3em .6em .1em;
        }
    </style>
</head>
<body>
    
    <script src="fontend/assets/dest/js/jquery.js"></script>
    <script src="fontend/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="fontend/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="fontend/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="fontend/assets/dest/vendors/animo/Animo.js"></script>
	<script src="fontend/assets/dest/vendors/dug/dug.js"></script>
	<script src="fontend/assets/dest/js/scripts.min.js"></script>
	<script src="fontend/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="fontend/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="fontend/assets/dest/js/waypoints.min.js"></script>
    <script src="fontend/assets/dest/js/wow.min.js"></script>
    <script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>

    
	<!--customjs-->
    <script src="fontend/assets/dest/js/custom2.js"></script>
    <script src="assets/plugins/toastr/js/toastr.min.js"></script>
    
    <?php $this->load->view('frontend/layout/header')?>
    <?php  $this->load->view($temp, $this->data);?>
    <?php $this->load->view('frontend/layout/footer')?>


	<!-- include js files -->
	
    <script>
        if (typeof TYPE_MESSAGE!="undefined") {
            switch (TYPE_MESSAGE) {
                case 'success':
                    toastr.success(MESSAGE);
                    break;
                case 'error':
                    toastr.error(MESSAGE);
                    break;
                default:
                    break;
            }
        }
        $(".js-show-login").click(function(event){
            event.preventDefault();
            toastr.warning("Bạn phải đăng nhập để thực hiện chức năng này");
            return false;
        })
        // NAVIGATION
        var responsiveNav =$('#responsive-nav'),
            catToggle = $('#responsive-nav .category-nav .category-header'),
            catList = $('#responsive-nav .category-nav .category-list'),
            menuToggle = $('#responsive-nav .menu-nav .menu-header'),
            menuList = $('#responsive-nav .menu-nav .menu-list');


        catToggle.on('click', function() {
            menuList.removeClass('open');
            catList.toggleClass('open');
        });

        menuToggle.on('click', function() {
            catList.removeClass('open');
            menuList.toggleClass('open');
        });
        var inputUpdate=$(".inputUpdate")
        var lableUpdate=$(".lableUpdate")
        $(".js-updateInfo").click(function(event){
            event.preventDefault();
            inputUpdate.show();
            lableUpdate.hide();
        })
        function notification(text, title) {
            toastr.success(text, title, { 
                timeOut: 5e3, 
                closeButton: !0, 
                debug: !1, 
                newestOnTop: !0, 
                progressBar: !0, 
                positionClass: "toast-top-right", 
                preventDuplicates: !0, 
                onclick: null, 
                showDuration: "300", 
                hideDuration: "1000", 
                extendedTimeOut: "1000", 
                showEasing: "swing", 
                hideEasing: "linear", 
                showMethod: "fadeIn", 
                hideMethod: "fadeOut", 
                tapToDismiss: !1 
            })
        }
        <?php if ($message) { ?>
            var text = <?= json_encode($message); ?>;
            notification(text, "Thông báo");
        <?php } ?>
    </script>
</body>
</html>
