<?php
Class Discount extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('discount_model');
	}

	function index(){
		$input = array();
		$list = $this->discount_model->get_list($input);
		$this->data['list'] = $list;
        // echo "<pre>";
        // print_r($list);
		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		//load view
		$this->data['page_title'] = 'Danh mục';
		$this->data['temp'] = 'admin/discount/index';
		$this->load->view('admin/layout/index', $this->data);

	}
	function add(){

		//neu ma co du lieu post len thi kiem tra
		if($this->input->post())
		{
			//load thư viện validate dữ liệu
			$this->load->library('form_validation');
			$this->load->helper('form');

			$this->form_validation->set_rules('code', 'Tên', 'required');

			//nhập liệu chính xác
			if($this->form_validation->run())
			{
				//them vao csdl
				$code = $this->input->post('code');
				$money = $this->input->post('money');
				$qty = $this->input->post('qty');
				$require_price = $this->input->post('require_price');
				$start = $this->input->post('start');
				$end = $this->input->post('end');
				
				//luu du lieu can them
				$data = array(
					'code'      => $code,
					'money'      => $money,
					'qty'      => $qty,
					'require_price'      => $require_price,
					'start'      => $start,
					'end'      => $end,
                );
                // echo "<pre>";
                // print_r($data);
				//them moi vao csdl
				if($this->discount_model->create($data))
				{
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
				//chuyen tới trang danh sách
				redirect(admin_url('discount'));
			}
		}
        
		$this->data['page_title'] = 'Thêm mới danh mục';
		$this->data['temp'] = 'admin/discount/add';
		$this->load->view('admin/layout/index', $this->data);
	}

	function edit($id){
        $discount = $this->discount_model->get_info($id);
        // echo "<pre>"; print_r($discount);
		if(!$discount)
		{
			$this->session->set_flashdata('message', 'Danh mục này không tồn tại');
			redirect(admin_url('discount'));
		}
		$this->data['discount'] = $discount;

		//neu ma co du lieu post len thi kiem tra
		if($this->input->post())
		{
			//load thư viện validate dữ liệu
			$this->load->library('form_validation');
			$this->load->helper('form');

			$this->form_validation->set_rules('code', 'Code', 'required');

			//nhập liệu chính xác
			if($this->form_validation->run())
			{
				//them vao csdl
				$code = $this->input->post('code');
				$money = $this->input->post('money');
				$qty = $this->input->post('qty');
				$require_price = $this->input->post('require_price');
				$start = $this->input->post('start');
				$end = $this->input->post('end');

				//luu du lieu can them
				$data = array(
					'code'      => $code,
					'money'      => $money,
					'qty'      => $qty,
					'require_price'      => $require_price,
					'start'      => $start,
					'end'      => $end,
				);

				//them moi vao csdl
				if($this->discount_model->update($id, $data))
				{
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
				//chuyen tới trang danh sách
				redirect(admin_url('discount'));
			}
		}

		$this->data['page_title'] = 'Cập nhật danh mục';
		$this->data['temp'] = 'admin/discount/edit';
		$this->load->view('admin/layout/index', $this->data);
	}


	function delete($id){

		$this->_del($id);

		//tạo ra nội dung thông báo
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
		redirect(admin_url('discount'));
    }
    

	private function _del($id, $rediect = true)
	{
		$info = $this->discount_model->get_info($id);
		if(!$info)
		{
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'không tồn tại danh mục này');
			if($rediect)
			{
				redirect(admin_url('discount'));
			}else{
				return false;
			}
		}

		//kiem tra xem danh muc nay co san pham khong
		$this->load->model('order_model');
		$order = $this->order_model->get_info_rule(array('discount_id' => $id), 'id');
		if($order)
		{
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'Mã giảm giá đã được dùng không thể xóa');
			if($rediect)
			{
				redirect(admin_url('discount'));
			}else{
				return false;
			}
		}

		//xoa du lieu
		$this->discount_model->delete($id);

	}
}
