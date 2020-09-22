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
                <h2 style="font-size: 25px;font-weight: 400;margin-bottom: 20px">Lịch sử đặt hàng</h2>
                <!-- /.box-header -->
                <div class="box-body no-padding label-order">
                    <table id="example" class="table">
                        <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Thông tin</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Thời gian</th>
                            </tr>
                            <tfoot class="auto_check_pages">
				                
                                    <td colspan="6"> 
                                        <div class="col-lg-8"></div>
                                        <div class="col-lg-4">
                                            <?php echo $this->pagination->create_links()?>
                                        </div>
                                  </td>
                                
                            </tfoot>
                            <?php if($orders):?>
                                <?php foreach ($orders as $order):?>
                                    <tr>
                                        <td><?php echo $order->id ?></td>
                                        <td>
                                           <ul>
                                               <li>Name: <?php echo $order->name?></li>
                                               <li>Phone: <?php echo $order->phone?></li>
                                               <li>Address: <?php echo $order->address?></li>
                                               <li>Email: <?php echo $order->email?></li>
                                           </ul>
                                        </td>
                                        <td><?php echo number_format($order->total,0,',','.') ?> VNĐ</td>

                                        <td>
                                            <?php if($order->status==1||$order->status==2):?>
                                                <span class="label label-warning">Đang giao</span>
                                            <?php elseif($order->status==-1):?>
                                                <span class="label label-danger">Đã bị hủy</span>
                                            <?php elseif($order->status==0):?>
                                                <span class="label label-success">Đã giao</span>
                                            <?php endif; ?>

                                        </td>
                                        <td><?php echo $order->created_at?></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif; ?>
                        </tbody>
                        
                    </table>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>
</div>
<script>
        $(document).ready( function () {
    $('#example').DataTable();
} );
</script>