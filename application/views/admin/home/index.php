<div class="container-fluid">
<div class="">
<div class="card">
    <div class="card-body text-center">
        <div class="row">
            <div class="col-sm-3 mb-sm-0">
                <div class="stat-widget-three py-2">
                    <div class="media">
                        <img class="mr-4 mt-3" src="assets/images/icons/4.png" alt="">
                        <div class="media-body">
                            <h2 class="mt-0 mb-1 text-info"><?php echo $total?></h2>
                            <span class="text-pale-sky ">Tổng hóa đơn</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-sm-0">
                <div class="stat-widget-three py-2">
                    <div class="media">
                        <img class="mr-4 mt-3" src="assets/images/icons/5.png" alt="">
                        <div class="media-body">
                            <h2 class="mt-0 mb-1 text-success"><?php echo $success?></h2>
                            <span class="text-pale-sky ">Đơn hàng đã giao</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="stat-widget-three py-2">
                    <div class="media">
                        <img class="mr-4 mt-3" src="assets/images/icons/6.png" alt="">
                        <div class="media-body">
                            <h2 class="mt-0 mb-1 text-danger"><?php echo $pending?></h2>
                            <span class="text-pale-sky ">Hóa đơn đang giao</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="stat-widget-three py-2">
                    <div class="media">
                        <img class="mr-4 mt-3" src="assets/images/icons/7.png" alt="">
                        <div class="media-body">
                            <h2 class="mt-0 mb-1 text-warning"><?php echo $total_money[0]->total?></h2>
                            <span class="text-pale-sky ">Tổng tiền </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>