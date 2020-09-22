
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
            <a href="{{route('get.home')}}">Home</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-3">
                    <h3 style="font-size: 20px" class="aside-menu">Thể loại sản phẩm
                    </h3>
                    <ul class="aside-menu">
                        <?php foreach ($categories as $item): ?>
                            <li><a href="<?php echo frontend_url('product/searchcate/').$item->id ?>"><?php echo $item->name ?></a></li>
                        <?php endforeach; ?>

                    </ul>
                    <h3 style="font-size: 20px" class="aside-menu">Nhà sản xuất</h3>
                    <ul class="aside-menu">
                        <?php foreach ($publishers as $item): ?>
                            <li><a href="<?php echo frontend_url('product/searchpub/').$item->id ?>"><?php echo $item->name ?></a></li>
                        <?php endforeach; ?>

                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>Sản phẩm</h4>
							<div class="beta-products-details">
								
								<div class="clearfix"></div>
							</div>

							<div class="row">
                                <?php if (isset($productSearch)): ?> 
                                    <?php foreach ($productSearch as $item):?>
                                        <div style="margin-bottom: 40px" class="col-sm-3">
                                            <div class="single-item">
                                                <div class="single-item-header">
                                                    <a href="<?php echo frontend_url('product/search/').$item->id ?>"><img style="width: 270px;height: 320px;" src="<?php echo "upload/".$item->picture?>" alt=""></a>
                                                </div>
                                                <div class="single-item-body">
                                                <div style="width: 100%;height: 40px;">
                                                    <strong class="single-item-title"><?php echo $item->name ?></strong>

                                                </div>
                                                    <p class="single-item-price">
                                                    <span><?php echo number_format($item->price,0,',','.')?> VND</span>
                                                    </p>
                                                    <br>
                                                </div>
                                                <div class="single-item-caption">
                                                    <a  class="add-to-cart pull-left" href="<?php echo frontend_url('product/addtocart/').$item->id ?>"><i class="fa fa-shopping-cart"></i></a>
                                                    <a  class="beta-btn primary" href="<?php echo frontend_url('product/search/').$item->id ?>">Details <i class="fa fa-chevron-right"></i></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                              </div>
                              <tfoot class="auto_check_pages">
				                
                                <td colspan="6"> 
                                    <div class="col-lg-8"></div>
                                    <div style="float: right;" class="col-lg-4">
                                        <?php echo $this->pagination->create_links()?>
                                    </div>
                                </td>
                    
                            </tfoot>
            
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->
            <div class="col-lg-12">
                <div class="" style="float: right">
                </div>
            </div>


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->