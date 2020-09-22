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
                <h2 style="font-size: 25px;font-weight: 400;margin-bottom: 20px">Thông tin tài khoản</h2>
                <form action="<?php echo frontend_url('customer/edit') ?>" method="POST">
                    <div class="checkout__input">
                        <div class="row">
                            <div style="margin-top: 16px" class="col-3">
                                <p style="color: #1c1c1c; font-weight: 700;">Name<span>* :</span></p>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-7">
                                        <input type="text" class="lableUpdate" value="<?php echo $customer->name ?>" disabled>
                                        <input class="inputUpdate" type="text" name="name" value="<?php echo $customer->name ?>" style="display: none">
                                    </div>
                                    <div class="col-2">
                                        <a href="" class="js-updateInfo lableUpdate"><i class="fa fa-edit"></i> Cập nhật</a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="checkout__input">
                        <div class="row">
                            <div style="margin-top: 16px" class="col-3">
                                <p style="color: #1c1c1c; font-weight: 700;">Phone<span>*   :</span></p>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-7">
                                <input type="text" class="lableUpdate" value=" <?php echo $customer->phone ?>" disabled>
                                <input  class="inputUpdate" type="text" name="phone" value="<?php echo $customer->phone ?>" style="display: none">
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>


                    <div class="checkout__input">
                        <div class="row">
                            <div style="margin-top: 16px" class="col-3">
                                <p style="color: #1c1c1c; font-weight: 700;">Email<span>*   :</span></p>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-7">
                                <input type="text" class="lableUpdate" value=" <?php echo $customer->email ?>" disabled>
                                <input  class="inputUpdate" type="text" disabled name="email" value="<?php echo $customer->email ?>" style="display: none">
                            </div>
                        </div>
                            </div>
                        </div>


                    </div>

                    <div class="checkout__input">
                        <div class="row">
                            <div style="margin-top: 16px" class="col-3">
                                <p style="color: #1c1c1c; font-weight: 700;">Address   :</p>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-7">
                                        <input type="text" class="lableUpdate" value="<?php echo $customer->address ?>" disabled>
                                        <input  class="inputUpdate" type="text" name="address" placeholder="Chưa có thông tin" class="checkout__input__add" value="<?php echo $customer->address ?> " style="display: none">
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <input type="submit" value="Cập nhật"  style="background: #7fad39;border: #7fad39;display:none" class="btn btn-primary inputUpdate" >
                </form>
            </div>
        </div>
    </div>
</div>