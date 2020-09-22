<div class="container">
    <div style="margin-top: 40px;" class="row">
        <div class="col-lg-3">
            <div class="list-group menu_item">
            <a href="<?php echo frontend_url('customer/info') ?>" class="list-group-item" style="color: black"><i class="fa fa-user" aria-hidden="true"></i> Thông tin tài khoản</a>
            <a href="<?php echo frontend_url('customer/order') ?>" class="list-group-item" style="color: black"><i class="fa fa-list-alt" aria-hidden="true"></i> Lịch sử đặt hàng</a>
            <a href="<?php echo frontend_url('customer/changepassword') ?>" class="list-group-item" style="color: black"><i class="fa fa-list-alt" aria-hidden="true"></i>Đổi mật khẩu</a>

        </div>
        </div>
        <div class="col-lg-9">
            <div class="well" style="padding: 19px;margin-bottom: 20px;border: 1px solid #e3e3e3;border-radius: 4px;box-shadow: inset 0 1px 1px rgba(0,0,0,.05);">
                <h2 style="font-size: 25px;font-weight: 400;margin-bottom: 20px">Thay đổi mậ khẩu</h2>
                <form action="<?php echo frontend_url('customer/changepw') ?>" method="POST">
                    <div class="checkout__input">
                        <div class="row">
                            <div style="margin-top: 16px" class="col-3">
                                <p style="color: #1c1c1c; font-weight: 700;">Mật khẩu cũ <span>* :</span></p>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-7">
                                        <input type="password" name="oldpassword" class="lableUpdate" value="" required >
                                        <div class="clear"></div>
        							    <div class="error" style="<?php echo 'color:red' ?>" id="name_error"><?php echo form_error('oldpassword')?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="checkout__input">
                        <div class="row">
                            <div style="margin-top: 16px" class="col-3">
                                <p style="color: #1c1c1c; font-weight: 700;">Mật khẩu mới<span>*   :</span></p>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-7">
                                <input type="password" name="newpassword" value="" required >
                                <div class="clear"></div>
        							<div class="error" style="<?php echo 'color:red' ?>" id="name_error"><?php echo form_error('newpassword')?></div>
                                
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>


                    <div class="checkout__input">
                        <div class="row">
                            <div style="margin-top: 16px" class="col-3">
                                <p style="color: #1c1c1c; font-weight: 700;">Nhập lại mật khẩu mới<span>*   :</span></p>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-7">
                                <input type="password" name="re-newpassword" value="" required >
                                <div class="clear"></div>
        							<div class="error" style="<?php echo 'color:red' ?>" id="name_error"><?php echo form_error('re-newpassword')?></div>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Xác nhận"  style="background: #7fad39;border: #7fad39;" class="btn btn-primary" >
                </form>
            </div>
        </div>
    </div>
</div>