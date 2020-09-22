<div style="margin-bottom: 40px" class="col-sm-3">
    <div class="single-item">
        <div class="single-item-header">
            <a href="{{route('get.product.detail',$product->slug."-".$product->id)}}"><img style="width: 270px;height: 320px;" src="{{asset('upload')."/".$product->picture}}" alt=""></a>
        </div>
        <div class="single-item-body">
        <strong class="single-item-title"><?php echo $item->name ?></strong>
            <p class="single-item-price">
            <span><?php echo number_format($item->price,0,',','.')?> </span>
            </p>
            <br>
        </div>
        <div class="single-item-caption">
            <a  class="add-to-cart pull-left" href="{{route('get.shopping.add',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
            <a  class="beta-btn primary" href="{{route('get.product.detail',$product->slug."-".$product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
            <div class="clearfix"></div>
        </div>
    </div>
</div>