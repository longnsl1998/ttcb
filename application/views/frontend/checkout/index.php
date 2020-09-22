<div class="container">
    <div id="content">
    <form action="<?php echo frontend_url('checkout/addorder') ?>" method="post" enctype="multipart/form-data" class="beta-form-checkout">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Đặt hàng</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                    <input type="text" name="name" placeholder="Họ tên" value="<?php if($this->session->userdata('user_id_login')){echo $info['name'];}?>" required>
                    </div>
                

                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" name="email" value="<?php if($this->session->userdata('user_id_login')){echo $info['email'];}?>" required placeholder="expample@gmail.com">
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input type="text" name="address" value="<?php if($this->session->userdata('user_id_login')){echo $info['address'];}?>" placeholder="Street Address" required>
                    </div>
                    

                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" name="phone" value="<?php if($this->session->userdata('user_id_login')){echo $info['phone'];}?>" required>
                    </div>
                    
                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea name="note" ></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5>
                            
                        </div>
                        <?php foreach ($this->cart->contents() as $item):?>
                            <div class="cart-item">
                                <div class="media">
                                    <div class="col-sm-3">
                                    <img style="width: 50px;height: 50px;" src="<?php echo "upload/".$item['picture']?>" alt="">
                                    </div>
                                    <div class="col-sm-9">
                                    <strong class="cart-item-title">Tên :    <?php echo $item['name']?></strong><br><br>
                                    <span class="cart-item-amount">Số lượng:      <?php echo $item['qty']?></span><br><br>
                                    <span>Giá tiền:   <?php echo $this->cart->format_number($item['subtotal']) ?> VND</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                            <div class="your-order-body" style="padding: 0px 10px">
                                <div class="your-order-item">
                                    <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black"><?php echo $this->cart->format_number($this->cart->total()) ?> VND</h5></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        <div class="form-block">
                            <input hidden id="payment_method_cheque" type="radio" class="input-radio" checked="checked" name="type" value="1" data-order_button_text="">
                            
                        </div>
                
                        <div class="your-order-head text-center"><button style="<?php echo 'width: 100%;height: 100%;font-size: 22px;color: #fff;background-color: #0277b8;}'?>" type="submit">Đặt hàng</button></div>

                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
