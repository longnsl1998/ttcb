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
    <li><a href="<?php echo admin_url('discount')?>"><button type="button" class="btn btn-primary">Quay lại <span class="btn-icon-right"><i class="fa fa-arrow-left color-info"></i></span></button></a></li>
</div>
<br>
    <div class="card forms-card">
        <div class="card-body">
            <h4 class="card-title mb-4">Sửa thể loại</h4>
            <div class="basic-form">
                <form method="POST" enctype="multipart/form-data" action="" class="form-input">
                    
                <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Code</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" id="code_add" name="code" value="<?php echo $discount->code?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Money</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" class="form-control" id="money_add" name="money" value="<?php echo $discount->money?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Amount</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" class="form-control" id="money_add" name="qty" value="<?php echo $discount->qty?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Require Money</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" class="form-control" id="money_add" name="require_price" value="<?php echo $discount->require_price?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Start</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="datetime-local" class="form-control" name="start" value="<?php echo date('Y-m-d\TH:i:s', strtotime($discount->start)); ?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">End</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="datetime-local" class="form-control" name="end" value="<?php echo date('Y-m-d\TH:i:s', strtotime($discount->end)); ?>">
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
                "code": {
                    required: !0,
                    minlength: 8
                },
                "money": {
                    required: !0,
                },
                "qty": {
                    required: !0,
                },
                "require_price": {
                    required: !0,
                },
                "start": {
                    required: !0,
                },
                "end": {
                    required: !0,
                },
            },
            messages: {
                "code": {
                    required: "Vui lòng nhập mã giảm giá!",
                    minlength: "Tên sản phẩm bắt buộc lớn hơn 3 ký tự!"
                },
                "money": {
                    required: "Vui lòng nhập số tiền được giảm!",
                    
                },
                "qty": {
                    required: "Vui lòng nhập số lượng mã giảm giá!",
                },
                "require_price": {
                    required: "Vui lòng nhập điều kiện được áp dụng mã!",
                },
                "start": {
                    required: "Vui lòng nhập ngày bắt đầu áp dụng mã!",
                },
                "end": {
                    required: "Vui lòng nhập ngày kết thúc áp dụng mã!",
                },
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