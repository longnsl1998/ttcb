<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Shopping Cart</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Shopping Cart</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        
        <div class="table-responsive">
            <!-- Shop Products Table -->
            <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                <thead>
                    <tr>
                        <th class="product-name">Product</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity">Qty.</th>
                        <th class="product-subtotal">Total</th>
                        <th class="product-remove">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->cart->contents() as $item): ?>
                    <tr class="cart_item">
                        <td class="product-name">
                            <div class="media">
                                <img class="pull-left" style="width: 80px;height: 80px;" src="<?php echo "upload/".$item['picture']?>" alt="">
                                <div class="media-body">
                                    <br><br>
                                <strong class="font-large table-title"><?php echo $item['name']?></strong>
                                </div>
                            </div>
                        </td>

                        <td class="product-subtotal">
                            <span class="amount"><?php echo $this->cart->format_number($item['price']) ?> VNĐ</span>
                        </td>

                        <td class="product-quantity">
                        <span class="amount"><?php echo $item['qty']?></span>
                        </td>

                        <td class="product-subtotal">
                        <span class="amount"><?php echo $this->cart->format_number($item['subtotal']) ?> VND</span>
                        </td>

                        <td class="product-remove">
                        <a href="<?php echo frontend_url('shopping/remove/').$item['rowid'] ?>" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                        <?php endforeach; ?>
                    
                </tbody>

                <!-- <tfoot>
                    <tr>
                        <td colspan="6" class="actions">
                        <form action="{{route('post.check.discount')}}" method="post">
                            <div class="coupon">
                                <label for="coupon_code">Coupon</label> 
                            <input type="text" name="code" value="" placeholder="Coupon code"> 
                                <button type="submit" class="beta-btn primary" name="apply_coupon">Apply Coupon <i class="fa fa-chevron-right"></i></button>
                            </div>
                            </form>
                        </td>
                    </tr>
                </tfoot> -->
            </table>
            <!-- End of Shop Table Products -->
        </div>


        <!-- Cart Collaterals -->
        <div class="cart-collaterals">

            <div style="width: 325px;" class="cart-totals pull-right">
                <div class="cart-totals-row"><h5 class="cart-total-title">Cart Totals</h5></div>
                <div class="cart-totals-row"><span>Cart Subtotal:</span><span><?php echo $this->cart->format_number($this->cart->total()) ?> VND</span></div>
                <!-- <div class="cart-totals-row"><span>Discount Money:</span><span>{{$money ?? "0"}} VND</span></div> -->
                <div class="cart-totals-row"><span>Order Total:</span> <span><?php echo $this->cart->format_number($this->cart->total()) ?> VND</span></div>
                <a href="<?php echo frontend_url('checkout')?>"><div style="text-align: center;background-color: #0277b8" class="cart-totals-row"><span style="color: azure; ">Mua hàng</span></div></a>              
            </div>

            <div class="clearfix"></div>
        </div>
        <!-- End of Cart Collaterals -->
        <div class="clearfix"></div>

    </div> <!-- #content -->
</div> <!-- .container -->