<div class="row page-titles">
    <div class="col p-md-0">
        <h4>Hello, <span>Welcome here</span></h4>
    </div>
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Thể loại</a>
            </li>
        </ol>
    </div>
</div>
<!-- row -->
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example_order" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $item):?>
                            <tr>
                            <td><?php echo $item->id ?></td>
                            <td><?php echo $item->name ?></td>
                            <td><?php echo $item->address ?></td>
                            <td><?php echo $item->total ?></td>
                            <td>
                                <?php if($item->status==1 || $item->status==2) : ?>
                                    <span class="label label-warning">Đang giao</span>
                                <?php elseif($item->status==-1) : ?>
                                    <span class="label label-danger">Đã hủy</span>
                                <?php else : ?>
                                    <span class="label label-success">Đã giao</span>
                                <?php endif; ?>
                            </td>
                            
                            <td>
                                <a href="<?php echo admin_url('order/info/'.$item->id)?>"><span><img src="<?php echo "assets/images/edit.png" ?>" style="width: 35px; height: 35px;" alt=""></span></a>
                                <?php if($item->status==1 || $item->status == 2) : ?>
                                    <a class="giaohang" href="<?php echo admin_url('order/confirm/'.$item->id)?>"><span><img src="<?php echo "assets/images/check.png" ?>" style="width: 35px; height: 35px;" alt=""></span></a>
                                <?php endif; ?>
                            </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
        $(document).ready(function(){
            $("#single-select-order").select2();
            $("#single-select-publisher").select2();
            $("#single-select-order1").select2();
            $("#single-select-publisher1").select2();
            var table = $('#example_order').DataTable({
            });
        })
        $(document).ready(function(){
            $("a.giaohang").click(function(e){
                if(!confirm('Bạn xác nhận đơn hàng đã giao?')){
                    e.preventDefault();
                    return false;
                }
                return true;
            });
});

        $(".form-input").validate({
            rules: {
                "name": {
                    required: !0,
                    minlength: 3
                }
            },
            messages: {
                "name": {
                    required: "Vui lòng nhập tên thể loại!",
                    minlength: "Tên sản phẩm bắt buộc lớn hơn 3 ký tự!"
                }
            },

            ignore: [],
            errorClass: "invalid-feedback animated fadeInUp",
            errorElement: "div",
            errorPlacement: function(e, a) {
                jQuery(a).parents(".form-group > div").append(e)
            },
            highlight: function(e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
            },
            success: function(e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
            },
        });
    </script>