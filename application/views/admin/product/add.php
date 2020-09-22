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
    <li><a href="<?php echo admin_url('product')?>"><button type="button" class="btn btn-primary">Quay lại <span class="btn-icon-right"><i class="fa fa-arrow-left color-info"></i></span></button></li>
</div>
<br>
    <div class="card forms-card">
        <div class="card-body">
            <h4 class="card-title mb-4">Form thêm sản phẩm</h4>
            <div class="basic-form">
                <form method="POST" enctype="multipart/form-data" action="" class="form-input">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Tên</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control" id="name_add" name="name" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Thể loại</label>
                        <div class="col-sm-8">
                            <select id="single-select-category1" name="category_id" class="form-control" style="width: 100%;">
                                <?php foreach ($this->category_model->get_list() as $item): ?>
                                <option value="<?php echo $item->id?>"> <?php echo $item->name?></option>
                                <?php endforeach; ?>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Nhà cung cấp</label>
                        <div class="col-sm-8">
                            <select id="single-select-publisher1" name="publisher_id" class="form-control" style="width: 100%;">
                            <?php foreach ($this->publisher_model->get_list() as $item): ?>
                                <option value="<?php echo $item->id?>"> <?php echo $item->name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Số lượng</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control" name="qty" id="qty_add" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Giá nhập</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="number" class="form-control" name="import_price" id="import_price_add">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Giá bán</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="number" class="form-control" name="price" id="price_add">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Giảm giá</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="number" class="form-control" name="sale" id="sale_add">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Ảnh</label>
                        <div class="col-sm-8">
                            <!-- {{-- <img id="picture_show" alt="" width="522" height="300" srcset=""> --}} -->
                            <div class="input-group">
                                <input type="file" class="form-control" name="picture" id="picture_add">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-label">Thông tin</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                
                                <textarea style="height: 9008px;" name="info" id="ck_editor"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col-sm-10">
                        </div>
                        <div class="col-sm-2">
                            
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div> 
                    </div>
                </form>
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
            var table = $('#example').DataTable({
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
        (function($) {
            "use strict"
            CKEDITOR.replace('ck_editor');
        })(jQuery);
       
    </script>