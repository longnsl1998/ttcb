<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 55 Giải Phóng, Hai Bà Trưng, Hà Nội</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0368 721 376</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    <?php if ($this->session->userdata('user_id_login')): ?>
                <li><a href="<?php echo frontend_url('customer/info') ?>"><i class="fa fa-user"></i>Tài khoản</a></li>
                    <li><a href="<?php echo frontend_url('customer/logout') ?>">Đăng xuất</a></li>
                    <?php else: ?>
                    <li><a href="<?php echo frontend_url('register') ?>">Đăng kí</a></li>
                    <li><a href="<?php echo frontend_url('login') ?>">Đăng nhập</a></li>
                    <?php endif; ?>

                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
            <a href="<?php echo frontend_url('home') ?>" id="logo"><img src="<?php echo 'fontend/assets/dest/images/logo-2.jpg' ?>" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                <form method="POST" enctype="multipart/form-data" id="searchform" action="<?php echo frontend_url('product/searchproduct') ?>">
                <input type="text" value="" name="name" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng ( <?php echo $this->cart->total_items() ?> )<i class="fa fa-chevron-down"></i></div>
                        <div class="beta-dropdown cart-body">
                            <?php foreach ($this->cart->contents() as $item):?>
                            <div class="cart-item">
                                <div class="media">
                                    <div class="col-sm-9">
                                    <strong class="cart-item-title"><?php echo $item['name'] ?></strong>
                                    <span class="cart-item-amount">: <?php echo $item['qty'] ?>*<span><?php echo $item['price']?></span></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>


                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value"><?php echo $this->cart->format_number($this->cart->total()); ?> VNĐ</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="<?php echo frontend_url('shopping')?>" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .cart -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                <li><a href="<?php echo frontend_url('home') ?>">Trang chủ</a></li>
                    <li><a href="<?php echo frontend_url('product') ?>">Sản phẩm</a>
                        <ul class="sub-menu">
                        <?php foreach ($categories as $item): ?>
                            <li><a href="<?php echo frontend_url('product/searchcate/').$item->id ?>"><?php echo $item->name ?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </li>
                <li><a href="<?php echo frontend_url('about') ?>">Giới thiệu</a></li>
                    <li><a href="<?php echo frontend_url('contact') ?>">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->