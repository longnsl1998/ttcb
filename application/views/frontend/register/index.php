<div class="container">
    <div id="content">
<form method="POST" enctype="multipart/form-data" action="<?php echo frontend_url('customer/register')?>" class="form-input">
            <div class="form-group row align-items-center">
                <label class="col-sm-3 col-form-label text-label">Email</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="email" class="form-control" id="email_add" name="email" value="" style="width:446px;" required>
                        <div class="clear"></div>
        							<div class="error" style="<?php echo 'color:red' ?>" id="email_error"><?php echo form_error('email')?></div>
                    </div>
                    
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label class="col-sm-3 col-form-label text-label">Password</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="password" class="form-control" id="password_add" name="password" value="" style="width:446px;" required>
                        <div class="clear"></div>
        							<div class="error" style="<?php echo 'color:red' ?>" id="password_error"><?php echo form_error('password')?></div>
                    </div>
                    
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label class="col-sm-3 col-form-label text-label">Tên</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="name_add" name="name" value="" style="width:446px;" required>
                        <div class="clear"></div>
        							<div class="error" style="<?php echo 'color:red' ?>" id="name_error"><?php echo form_error('name')?></div>
                    </div>
                    
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label class="col-sm-3 col-form-label text-label">Gender</label>
                <div class="col-sm-9">
                    <select id="single-select-gender-add" name="gender" class="form-control" style="width:446px;">
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>   
                    </select>
                </div>
            </div>

            <div class="form-group row align-items-center">
                <label class="col-sm-3 col-form-label text-label">Phone</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="phone_add" name="phone" value="" style="width:446px;" required>
                        <div class="clear"></div>
        							<div class="error" style="<?php echo 'color:red' ?>" id="phone_error"><?php echo form_error('phone')?></div>
                    </div>
                   
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label class="col-sm-3 col-form-label text-label">Address</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" id="address_add" name="address" value="" style="width:446px;" required>
                        <div class="clear"></div>
        							<div class="error" style="<?php echo 'color:red' ?>" id="address_error"><?php echo form_error('address')?></div>
                    </div>
                    
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                    <button style="width: 446px;" type="submit" class="btn btn-primary">Register</button>
                </div>                                           
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
<script>
        $(".form-input").validate({
            rules: {
                "name": {
                    required: !0,
                    minlength: 3
                },
                 "email": {
                    required: !0,
                    minlength: 3,
                    unique:customers,email
                }
            },
            messages: {
                "name": {
                    required: "Vui lòng nhập tên khách hàng!",
                    minlength: "Tên sản phẩm bắt buộc lớn hơn 3 ký tự!"
                },
                "email": {
                    required: "Vui lòng nhập tên khách hàng!",
                    unique: "trùng"
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
                jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
            },
        });
</script>