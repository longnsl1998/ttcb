<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Product</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Product</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content ">
        <div class="row">
            <div class="col-sm-12">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="<?php echo "upload/".$product->picture?>" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="pro_detail single-item-body ">
                            <span>Tên sản phẩm :</span>
                            <strong class="single-item-title"><?php echo $product->name?></strong><br><br>
                            <span>Giá tiền :</span>
                            <span class="single-item-price">
                                <span><?php echo number_format($product->price,0,',','.') ?> VND</span>
                            </span><br>
                            <?php if ($product->qty>0):?>
                                <br><br>
                                
                                <div class="clearfix"></div>       
                            <div class="space20">&nbsp;</div>
                            <div class="single-item-caption">
                                <span class="label label-success">Còn hàng</span>
                                  <a class="add-to-cart" href="<?php echo frontend_url('product/addtocart/').$product->id ?>"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                            <?php else: ?>
                                <span class="label label-danger">Hết hàng</span>
                            <?php endif; ?>
                        </div>

                        
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Description</a></li>
                        <li><a href="#tab-reviews">Reviews</a></li>
                    </ul>

                    <div class="panel info" id="tab-description">
                        
                    </div>
                    <div class="panel" id="tab-reviews">
                        <div class="block-reviews" id="block-review">
                            <div class="col-12">
                            <form class="" method="POST" action="{{route('post.product.review')}}" id="form-review">
                                    <div class="form-group">
                                        
                                    </div>
                                    <div class="form-group">
                                    <textarea name="content" id="" cols="5" class="form-control" rows="5" placeholder="Nhập đánh giá sản phẩm (Tối đa 80 ký tự)"></textarea>
                                    </div>
                                    <input type="hidden" name="review" id="review_value" value="5">
                                    <input type="hidden" name="product_id"  value="{{$product->id}}">
                                <button type="submit" class="btn btn-success {{Auth::guard('customer')->check() ? "review":"js-login"}}" >
                                        Gửi đánh giá
                                     </button>
                                </form>
                            </div>
                        <div class="row review_list" style="<?php echo 'padding-top: 40px'?>">
                            <?php if (isset($comments)): ?>
                                <?php foreach ($comments as $item): ?>
                                    <div class="col-12" style="<?php echo 'margin-bottom: 15px;margin-left: 10px;' ?>">
                                        <div class="col-12">
                                            <div class="item">
                                                <span style="<?php echo 'font-weight: 700'?>"><?php echo $this->db->get_where('customers',array('id'=>$item->customer_id))->result()[0]->name;?></span>
                                            </div>
                                            <div class="item_review">
                                                &emsp;&nbsp;<?php echo $item->content?>
                                            </div>
                                            <div class="item_footer">
                                                <span class="item_time" style="<?php echo 'color: darkgray' ?>"><i class="fa fa-clock-o" style="<?php echo 'margin: 0 2px' ?>"></i> <?php echo $item->created_at ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                <?php endforeach;?>
                                <div class="col-lg-12">
                                    <div class="" style="float: right">
                                        
                                    </div>
                                </div>
                                <?php endif; ?>

                        </div>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
</div>

<script>
    jQuery(function($) {
        let info = <?php echo json_encode($product->info); ?>;
        $('.info').html(info);
    });
    
        jQuery(function($) {
            $('.review').click(function(event){
            event.preventDefault();
            let $this=$(this);
            let url=$this.parents('form').attr('action');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method:'POST',
                url: url,
                data:$('#form-review').serialize(),
            }).done(function( results ) {
                $('#form-review')[0].reset();
                console.log(results);
                if (results.html) {
                    $('.review_list').prepend(results.html);
                }
                toastr.success(results.messages);
            });
        })
        });
</script>