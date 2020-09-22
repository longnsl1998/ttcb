<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php if (!empty($page_title)) echo $page_title; else echo "Trang quản trị" ?></title>
    <!-- Favicon icon -->
    <base href="<?php echo public_url('')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link href="assets/plugins/toastr/css/toastr.min.css" rel="stylesheet">
    <link href="main/css/style.css" rel="stylesheet">
    <style>
        #cke_ck_editor {
            width: 100%;
        }
    </style>
</head>

<body>
     <!--**********************************
        Scripts
    ***********************************-->
    <script src="assets/plugins/common/common.min.js"></script>
    <script src="main/js/custom.min.js"></script>
    <script src="main/js/settings.js"></script>
    <script src="main/js/gleek.js"></script>
    <script src="main/js/styleSwitcher.js"></script>
    
    <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="assets/plugins/bootstrap4-notify/bootstrap-notify.min.js"></script>
    <script src="assets/plugins/toastr/js/toastr.min.js"></script>
    <script src="assets/plugins/ckeditor/ckeditor.js"></script>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo"><a href="<?php echo admin_url('home') ?>"><b><img src="<?php echo base_url('public/assets/images/logo.png') ?>" alt=""> </b><span class="brand-title"><img src="assets/images/logo-text.png" alt=""></span></a>
            </div>
            <div class="nav-control">
                <div class="hamburger"><span class="line"></span>  <span class="line"></span>  <span class="line"></span>
                </div>
                </br>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <?php $this->load->view('admin/layout/header')?>

        <?php $this->load->view('admin/layout/sidebar')?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <?php  $this->load->view($temp, $this->data);?>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        

        
       
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

   
    <script>
        $(document).ready(function(){
            $("#single-select-category").select2();
            $("#single-select-publisher").select2();
            $("#single-select-category1").select2();
            $("#single-select-publisher1").select2();
            var table = $('#example').DataTable({
            });
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
        // (function($) {
        //     "use strict"
        //     CKEDITOR.replace('ck_editor');
        // })(jQuery);
        
    </script>
    
</body>
</html>