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
    <li><a href="<?php echo admin_url('customer')?>"><button type="button" class="btn btn-primary">Quay lại <span class="btn-icon-right"><i class="fa fa-arrow-left color-info"></i></span></button></a></li>
</div>
<br>
    <div class="card forms-card">
        <div class="card-body">
            <h4 class="card-title mb-4">Sửa thể loại</h4>
            <div class="basic-form">
                <form method="POST" enctype="multipart/form-data" action="" class="form-input">
                    
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Tên</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" id="name_edit" name="name" value="<?php echo $customer->name?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Gender</label>
                        <div class="col-sm-9">
                            <select id="single-select-gender" name="gender" class="form-control" style="width: 100%;">
                                <option value="0" <?php if(0==$customer->gender) echo 'selected="selected"'; ?> >Nam</option>
                                <option value="1" <?php if(1==$customer->gender) echo 'selected="selected"'; ?>>Nữ</option>   
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Email</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" id="email_edit" name="email" value="<?php echo $customer->email?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Phone</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" id="phone_edit" name="phone" value="<?php echo $customer->phone?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label text-label">Address</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" id="address_edit" name="address" value="<?php echo $customer->address?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col-sm-10">
                        </div>
                        <div class="col-sm-2">
                            
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
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

        $(document).on('click','.edit-row',function(){
            $.ajax({
                type: "GET",
                url: "{{ url('/categories/') }}"+"/"+$(this).data('id'),
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#id_edit').val(data.id);
                    $('#name_edit').val(data.name);
                }
            })
        })
        $(document).on('click','.add-row',function(){
            $.ajax({
                // type: "POST",
                // url: "{{ url('/products/create') }}",
                // headers: {
                //     'X-CSRF-TOKEN': "{{ csrf_token() }}"
                // },
                success: function(data) {
                    $('#name_add').val(data.name);
                }
            })
        })
        $(document).on('click','.detail-row',function(){
            $.ajax({
                type: "GET",
                url: "{{ url('/categories/') }}"+"/"+$(this).data('id'),
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#id_detail').val(data.id);
                    $('#name_detail').val(data.name);
                }
            })
        })

        $(document).on('click','.delete-row',function(){
            $('#id_del').val($(this).data('id'));
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