<?php
Class Product extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		
	}

	function index(){
		$input = array();
		$list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
        $this->load->model('category_model');
        $this->load->model('publisher_model');
        // echo "<pre>";
        // print_r($list);
		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		//load view
		$this->data['page_title'] = 'Danh mục';
		$this->data['temp'] = 'admin/product/index';
		$this->load->view('admin/layout/index', $this->data);

	}
	function add(){
        $this->load->model('category_model');
        $this->load->model('publisher_model');
        // $ct = array();
        // $ct = $this->category_model->get_list($ct);
        // echo "<pre>";
        // print_r($ct);
        
		//neu ma co du lieu post len thi kiem tra
		if($this->input->post())
		{
			//load thư viện validate dữ liệu
			$this->load->library('form_validation');
			$this->load->helper('form');

            // echo "<pre>";
            // print_r($product);

            $this->form_validation->set_rules('name', 'Tên', 'required');
			//nhập liệu chính xác
			if($this->form_validation->run())
			{
				//them vao csdl
				$name = $this->input->post('name');
				$category_id = $this->input->post('category_id');
				$publisher_id = $this->input->post('publisher_id');
				$qty = $this->input->post('qty');
                $price = $this->input->post('price');
				$import_price = $this->input->post('import_price');
				$info = $this->input->post('info');
				$sale = $this->input->post('sale');
                
                
                // xử lý ảnh
                    $target_dir = "public/upload/";
                    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    // Check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["picture"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                    }

                    // Check if file already exists
                    if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                    }

                    // Check file size
                    if ($_FILES["picture"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    } else {
                    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["picture"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                    }
                $picture = basename($_FILES["picture"]["name"]);
				//luu du lieu can them
				$data = array(
					'name'      => $name,
					'category_id'      => $category_id,
					'publisher_id'      => $publisher_id,
					'price'      => $price,
					'qty'      => $qty,
					'import_price'      => $import_price,
					'sale'      => $sale,
					'info'      => $info,
					'picture'      => $picture,
					'created_at' => standard_date('DATE_W3C',time())
				);
				//them moi vao csdl
				if($this->product_model->create($data))
				{
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
				//chuyen tới trang danh sách
				redirect(admin_url('product'));
			}
		}

		$this->data['page_title'] = 'Thêm mới danh mục';
		$this->data['temp'] = 'admin/product/add';
		$this->load->view('admin/layout/index', $this->data);
	}

	function edit($id){
        $this->load->model('category_model');
        $this->load->model('publisher_model');
        $product = $this->product_model->get_info($id);
        // echo "<pre>"; print_r($product);
        $info= $product->info;
		if(!$product)
		{
			$this->session->set_flashdata('message', 'Danh mục này không tồn tại');
			redirect(admin_url('product'));
		}
		$this->data['product'] = $product;
		$this->data['info'] = $info;
        // echo "<pre>"; print_r($info);

		//neu ma co du lieu post len thi kiem tra
		if($this->input->post())
		{
			//load thư viện validate dữ liệu
			$this->load->library('form_validation');
			$this->load->helper('form');

			$this->form_validation->set_rules('name', 'Tên', 'required');

			//nhập liệu chính xác
			if($this->form_validation->run())
			{
				//them vao csdl
				$name = $this->input->post('name');
				$category_id = $this->input->post('category_id');
				$publisher_id = $this->input->post('publisher_id');
				$qty = $this->input->post('qty');
                $price = $this->input->post('price');
				$import_price = $this->input->post('import_price');
				$info = $this->input->post('info');
				$sale = $this->input->post('sale');
                
                
                // xử lý ảnh
                    $target_dir = "public/upload/";
                    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    // Check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["picture"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                    }

                    // Check if file already exists
                    if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                    }

                    // Check file size
                    if ($_FILES["picture"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    } else {
                    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["picture"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
					}
					if(basename($_FILES["picture"]["name"])){
						$picture = basename($_FILES["picture"]["name"]);
					}
					else{
						$picture = $product->picture;
					}
                
				//luu du lieu can them
				$data = array(
					'name'      => $name,
					'category_id'      => $category_id,
					'publisher_id'      => $publisher_id,
					'price'      => $price,
					'qty'      => $qty,
					'import_price'      => $import_price,
					'sale'      => $sale,
					'info'      => $info,
					'picture'      => $picture,
				);
				//them moi vao csdl
				if($this->product_model->update($id, $data))
				{
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Cập nhật sản phẩm thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
				//chuyen tới trang danh sách
				redirect(admin_url('product'));
			}
		}

		$this->data['page_title'] = 'Cập nhật sản phẩm';
		$this->data['temp'] = 'admin/product/edit';
		$this->load->view('admin/layout/index', $this->data);
	}


	function delete($id){

		$this->_del($id);

		//tạo ra nội dung thông báo
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
		redirect(admin_url('product'));
    }
    

	private function _del($id, $rediect = true)
	{
		$info = $this->product_model->get_info($id);
		if(!$info)
		{
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'không tồn tại danh mục này');
			if($rediect)
			{
				redirect(admin_url('product'));
			}else{
				return false;
			}
		}

		//kiem tra xem danh muc nay co san pham khong
		$this->load->model('ordertail_model');
		$ordertail = $this->ordertail_model->get_info_rule(array('product_id' => $id), 'id');
		if($ordertail)
		{
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'Sản phẩm'.$info->name.' không thể xóa');
			if($rediect)
			{
				redirect(admin_url('product'));
			}else{
				return false;
			}
		}

		//xoa du lieu
		$this->product_model->delete($id);

	}
}
