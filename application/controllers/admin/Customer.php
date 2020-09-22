<?php
Class Customer extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('customer_model');
	}

	function index(){
		$input = array();
		$list = $this->customer_model->get_list($input);
		$this->data['list'] = $list;
        ;
		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		// echo "<pre>";
        // print_r($message);
		//load view
		$this->data['page_title'] = 'Danh mục';
		$this->data['temp'] = 'admin/customer/index';
		$this->load->view('admin/layout/index', $this->data);

	}
	// function add(){

	// 	//neu ma co du lieu post len thi kiem tra
	// 	if($this->input->post())
	// 	{
	// 		//load thư viện validate dữ liệu
	// 		$this->load->library('form_validation');
	// 		$this->load->helper('form');

	// 		$this->form_validation->set_rules('name', 'Tên', 'required');

	// 		//nhập liệu chính xác
	// 		if($this->form_validation->run())
	// 		{
	// 			//them vao csdl
	// 			$name = $this->input->post('name');
				
	// 			//luu du lieu can them
	// 			$data = array(
	// 				'name'      => $name,
	// 			);
	// 			//them moi vao csdl
	// 			if($this->customer_model->create($data))
	// 			{
	// 				//tạo ra nội dung thông báo
	// 				$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
	// 			}else{
	// 				$this->session->set_flashdata('message', 'Không thêm được');
	// 			}
	// 			//chuyen tới trang danh sách
	// 			redirect(admin_url('customer'));
	// 		}
	// 	}

	// 	$this->data['page_title'] = 'Thêm mới danh mục';
	// 	$this->data['temp'] = 'admin/customer/add';
	// 	$this->load->view('admin/layout/index', $this->data);
	// }

	function edit($id){
        $customer = $this->customer_model->get_info($id);
        // echo "<pre>"; print_r($customer);
		if(!$customer)
		{
			$this->session->set_flashdata('message', 'Danh mục này không tồn tại');
			redirect(admin_url('customer'));
		}
		$this->data['customer'] = $customer;

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
				$gender = $this->input->post('gender');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address');

				//luu du lieu can them
				$data = array(
					'name'      => $name,
					'gender'      => $gender,
					'phone'      => $phone,
					'address'      => $address
				);

				//them moi vao csdl
				if($this->customer_model->update($id, $data))
				{
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
				//chuyen tới trang danh sách
				var_dump($this->session->flashdata('message'));
				redirect(admin_url('customer'));
			}
		}

		$this->data['page_title'] = 'Cập nhật danh mục';
		$this->data['temp'] = 'admin/customer/edit';
		$this->load->view('admin/layout/index', $this->data);
	}


	function delete($id){

		$this->_del($id);

		//tạo ra nội dung thông báo
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
		redirect(admin_url('customer'));
    }
    

	private function _del($id, $rediect = true)
	{
		$info = $this->customer_model->get_info($id);
		if(!$info)
		{
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'không tồn tại danh mục này');
			if($rediect)
			{
				redirect(admin_url('customer'));
			}else{
				return false;
			}
		}

		//kiem tra xem danh muc nay co san pham khong
		$this->load->model('order_model');
		$order = $this->order_model->get_info_rule(array('customer_id' => $id), 'id');
		if($order)
		{
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'Khách hàng '.$info->name.' đang có hóa đơn nên không thể xóa');
			if($rediect)
			{
				redirect(admin_url('customer'));
			}else{
				return false;
			}
		}

		//xoa du lieu
		$this->customer_model->delete($id);

	}
}
