
<div class="rev-slider">
	<div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer" >
                <div class="banner" >
                    <ul>
                        <!-- THE FIRST SLIDE -->
                        <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                        <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="fontend/assets/dest/images/thumbs/11.jpg" data-src="fontend/assets/dest/images/thumbs/11.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('fontend/assets/dest/images/thumbs/11.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                        </div>
                                    </div>

                    </li>
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="fontend/assets/dest/images/thumbs/15.jpg" data-src="fontend/assets/dest/images/thumbs/15.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('fontend/assets/dest/images/thumbs/15.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                </div>
                                </div>

                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                        <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="fontend/assets/dest/images/thumbs/13.jpg" data-src="fontend/assets/dest/images/thumbs/13.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('fontend/assets/dest/images/thumbs/13.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>

                    </li>
                    </ul>
                </div>
            </div>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
							
								<div class="clearfix"></div>
							</div>

							<div class="row">
                                <?php if ($newproduct) :?>
                                  <?php foreach ($newproduct as $item): ?>
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
                                                <span><?php echo number_format($item->price,0,',','.')?> VND </span>
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
						</div> <!-- .beta-products-list -->

						<div class="beta-products-list">
							<h4>Sản phẩm</h4>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>
							<div class="row">
                            <?php if ($product) :?>
                                   
                                  <?php foreach ($product as $item): ?>
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
                                                <span><?php echo number_format($item->price,0,',','.')?> VND </span>
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


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div>