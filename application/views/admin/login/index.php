<!DOCTYPE html>
<html lang="en" class="h-100" id="login-page1">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php if (!empty($page_title)) echo $page_title; else echo "Trang quản trị" ?></title>
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png"> -->
    <!-- Custom Stylesheet -->
    <script type="text/javascript">
	var admin_url 	= '';
	var base_url 	= 'http://baitap.php:8080/ttcb';
	var public_url 	= '';
    </script>
    <link href="<?php echo base_url('public') ?>/main/css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div class="login-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content login-form">
                        <div class="card">
                            <div class="card-body">
                                <div class="logo text-center">
                                    <a href="index.html">
                                        <img src="{{ asset('assets/images/f-logo.png') }}" alt="">
                                    </a>
                                </div>
                                <h4 class="text-center mt-4">Đăng nhập hệ thống</h4>
                                <!-- @if (session('error'))  
                                    <div class="alert alert-danger"> {{ session('error') }}</div>
                                @endif -->
                                <form class="form-valide-with-icon" action="login" method="post">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-user" ></i> </span>
                                            </div>
                                            <input type="text" class="form-control" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group transparent-append">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-lock" ></i> </span>
                                            </div>
                                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-check p-l-0">
                                                <input class="form-check-input" type="checkbox" id="basic_checkbox_1">
                                                <label class="form-check-label ml-3" for="basic_checkbox_1">Check me out</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 text-right"><a href="javascript:void()">Quên mật khẩu</a>
                                        </div>
                                    </div>
                                    <div class="text-center mb-4 mt-4">
                                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <p class="mt-5">Bạn chưa có tài khoản? <a href="javascript:void()">Đăng ký ngay</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <!-- Common JS -->
    <script src="<?php echo base_url('public') ?>/assets/plugins/common/common.min.js"></script>
    <script src="<?php echo base_url('public') ?>/main/js/custom.min.js"></script>
    <script src="<?php echo base_url('public') ?>/main/js/settings.js"></script>
    <script src="<?php echo base_url('public') ?>/main/js/gleek.js"></script>
    <script src="<?php echo base_url('public') ?>/main/js/styleSwitcher.js"></script>
    
    <script src="<?php echo base_url('public') ?>/assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('public') ?>/assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?php echo base_url('public') ?>/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script>
        jQuery(".form-valide-with-icon").validate({
            rules: {
                "email": {
                    required: !0,
                    email: !0
                },
                "password": {
                    required: !0
                }
            },
            messages: {
                "email": {
                    required: "Bạn chưa nhập email!",
                    email: "Bạn chưa nhập đúng định dạng email!"
                },
                "password": {
                    required: "Bạn chưa nhập mật khẩu!"
                }
            },
        
            ignore: [],
            errorClass: "invalid-feedback animated fadeInUp",
            errorElement: "div",
            errorPlacement: function(e, a) {
                jQuery(a).parents(".form-group > div").append(e)
            },
            highlight: function(e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
            },
            success: function(e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
            }
        });
</script>
</body>

</html>