    <div class="row page-titles">
        <div class="col p-md-0">
            <h4>Hello, <span>Welcome here</span></h4>
        </div>
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Sản phẩm</a>
                </li>
            </ol>
        </div>
    </div>
<!-- row -->
    <div class="col-lg-6">
        <li><a href="<?php echo admin_url('product/add')?>"><button type="button" class="btn btn-primary">Thêm mới <span class="btn-icon-right"><i class="fa fa-plus color-info"></i></span></button></a></li>
    </div>
<br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Thể loại</th>
                                    <th>Nhà cung cấp</th>
                                    <th>Số lượng</th>
                                    <th>Giá bán</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list as $item):?>
                                    <tr>
                                    <td><?php echo $item->id ?></td>
                                    <td><?php echo $item->name ?></td>
                                    <td><?php echo ($this->category_model->get_info($item->category_id))->name  ?></td>
                                    <td><?php echo ($this->publisher_model->get_info($item->publisher_id))->name ?></td>
                                    <td><?php echo $item->qty ?></td>
                                    <td><?php echo $item->price ?></td>
                                    
                                    <td>
                                        <a href="<?php echo admin_url('product/edit/'.$item->id)?>"><span><img src="<?php echo "assets/images/edit.png" ?>" style="width: 35px; height: 35px;" alt=""></span></a>
                                        <a class="delete" href="<?php echo admin_url('product/delete/'.$item->id)?>"><span><img src="<?php echo "assets/images/delete.png" ?>" style="width: 35px; height: 35px;" alt=""></span></a>
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
            $("#single-select-category").select2();
            $("#single-select-publisher").select2();
            $("#single-select-category1").select2();
            $("#single-select-publisher1").select2();
            var table = $('#example_product').DataTable({
            });
        })
        $(document).ready(function(){
            $("a.delete").click(function(e){
                if(!confirm('Bạn có chắc chắn muốn xóa?')){
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
        (function($) {
            "use strict"
            CKEDITOR.replace('ck_editor');
        })(jQuery);
        
</script>