<?php
Class Publisher extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('publisher_model');
	}

	function index(){
		$input = array();
		$list = $this->publisher_model->get_list($input);
		$this->data['list'] = $list;
        // echo "<pre>";
        // print_r($list);
		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		//load view
		$this->data['page_title'] = 'Danh mục';
		$this->data['temp'] = 'admin/publisher/index';
		$this->load->view('admin/layout/index', $this->data);

	}
	function add(){

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
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address');
				
				//luu du lieu can them
				$data = array(
					'name'      => $name,
					'email'      => $email,
					'phone'      => $phone,
					'address'      => $address,
				);
				//them moi vao csdl
				if($this->publisher_model->create($data))
				{
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
				//chuyen tới trang danh sách
				redirect(admin_url('publisher'));
			}
		}

		$this->data['page_title'] = 'Thêm mới danh mục';
		$this->data['temp'] = 'admin/publisher/add';
		$this->load->view('admin/layout/index', $this->data);
	}

	function edit($id){
        $publisher = $this->publisher_model->get_info($id);
        // echo "<pre>"; print_r($publisher);
		if(!$publisher)
		{
			$this->session->set_flashdata('message', 'Danh mục này không tồn tại');
			redirect(admin_url('publisher'));
		}
		$this->data['publisher'] = $publisher;

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
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address');
				
				//luu du lieu can them
				$data = array(
					'name'      => $name,
					'email'      => $email,
					'phone'      => $phone,
					'address'      => $address,
				);

				//them moi vao csdl
				if($this->publisher_model->update($id, $data))
				{
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
				//chuyen tới trang danh sách
				redirect(admin_url('publisher'));
			}
		}

		$this->data['page_title'] = 'Cập nhật danh mục';
		$this->data['temp'] = 'admin/publisher/edit';
		$this->load->view('admin/layout/index', $this->data);
	}


	function delete($id){

		$this->_del($id);

		//tạo ra nội dung thông báo
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
		redirect(admin_url('publisher'));
    }
    

	private function _del($id, $rediect = true)
	{
		$info = $this->publisher_model->get_info($id);
		if(!$info)
		{
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'không tồn tại danh mục này');
			if($rediect)
			{
				redirect(admin_url('publisher'));
			}else{
				return false;
			}
		}

		//kiem tra xem danh muc nay co san pham khong
		$this->load->model('product_model');
		$product = $this->product_model->get_info_rule(array('publisher_id' => $id), 'id');
		if($product)
		{
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'Nhà sản xuất '.$info->name.' có chứa sản phẩm,bạn cần xóa các sản phẩm trước khi xóa ');
			if($rediect)
			{
				redirect(admin_url('publisher'));
			}else{
				return false;
			}
		}

		//xoa du lieu
		$this->publisher_model->delete($id);

	}
}
