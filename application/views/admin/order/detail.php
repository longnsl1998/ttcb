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
<div class="col-lg-6">
    <!-- <button type="button" class="btn btn-primary add-row" data-toggle="modal"  data-target="#addcategory">Thêm mới<span class="btn-icon-right"><i
        class="mdi mdi-plus-outline"></i></span>
    </button> -->
    <li><a href="<?php echo admin_url('order')?>"><button type="button" class="btn btn-primary">Quay lại <span class="btn-icon-right"><i class="fa fa-arrow-left color-info"></i></span></button></a></li>
</div>
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example_orderdetails" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Amount</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orderdetails as $item):?>
                            <tr>
                            <td><?php echo $item->id ?></td>
                            <td><?php echo $this->product_model->get_info($item->product_id)->name ?></td>
                            <td><?php echo $item->qty ?></td>
                            <td><?php echo $item->price ?></td>
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
</div>
<script>
        $(document).ready(function(){
            $("#single-select-category").select2();
            $("#single-select-publisher").select2();
            $("#single-select-category1").select2();
            $("#single-select-publisher1").select2();
            var table = $('#example_orderdetails').DataTable({
            });
        })
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