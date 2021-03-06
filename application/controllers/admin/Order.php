<?php
Class Order extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
		$this->load->model('orderdetail_model');
		$this->load->library('session');
	}

	function index(){
		$input = array();
		$list = $this->order_model->get_list($input);
		$this->data['list'] = $list;
        // echo "<pre>";
        // print_r($list);
		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		// echo "<pre>";
        // print_r(session($message));
		//load view
		$this->data['page_title'] = 'Danh mục';
		$this->data['temp'] = 'admin/order/index';
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
				
				//luu du lieu can them
				$data = array(
					'name'      => $name,
				);
				//them moi vao csdl
				if($this->order_model->create($data))
				{
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
				//chuyen tới trang danh sách
				redirect(admin_url('order'));
			}
		}

		$this->data['page_title'] = 'Thêm mới danh mục';
		$this->data['temp'] = 'admin/order/add';
		$this->load->view('admin/layout/index', $this->data);
	}

	function confirm($id){
        $order = $this->order_model->get_info($id);
        // echo "<pre>"; print_r($order);
		if(!$order)
		{
			$this->session->set_flashdata('message', 'Danh mục này không tồn tại');
			redirect(admin_url('order'));
		}
		$this->data['order'] = $order;

		//them vao csdl
        $status = 0;

        //luu du lieu can them
        $data = array(
            'status'      => 0
        );

        //them moi vao csdl
        if($this->order_model->update($id, $data))
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Đã xác nhận giao hàng');
        }else{
            $this->session->set_flashdata('message', 'Có lỗi xảy ra!!!');
        }
        //chuyen tới trang danh sách
        redirect(admin_url('order'));

		// $this->data['page_title'] = 'Cập nhật danh mục';
		// $this->data['temp'] = 'admin/order/edit';
		// $this->load->view('admin/layout/index', $this->data);
	}
    function info($id){
		$this->load->model('orderdetail_model');
		$this->load->model('product_model');

        $orderdetails = $this->orderdetail_model->get_list1("orderdetails",array('order_id'=>$id));
        // echo "<pre>"; print_r($orderdetails);
        $order = $this->order_model->get_info($id);

		if(!$order)
		{
			$this->session->set_flashdata('message', 'Danh mục này không tồn tại');
			redirect(admin_url('order'));
		}
		$this->data['orderdetails'] = $orderdetails;
		$this->data['page_title'] = 'Chi tiết đơn hàng';
		$this->data['temp'] = 'admin/order/detail';
		$this->load->view('admin/layout/index', $this->data);
	}

	function delete($id){

		$this->_del($id);

		//tạo ra nội dung thông báo
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
		redirect(admin_url('order'));
    }
    

	private function _del($id, $rediect = true)
	{
		$info = $this->order_model->get_info($id);
		if(!$info)
		{
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'không tồn tại danh mục này');
			if($rediect)
			{
				redirect(admin_url('order'));
			}else{
				return false;
			}
		}

		//kiem tra xem danh muc nay co san pham khong
		$this->load->model('product_model');
		$product = $this->product_model->get_info_rule(array('order_id' => $id), 'id');
		if($product)
		{
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'Danh mục '.$info->name.' có chứa sản phẩm,bạn cần xóa các sản phẩm trước khi xóa danh mục');
			if($rediect)
			{
				redirect(admin_url('order'));
			}else{
				return false;
			}
		}

		//xoa du lieu
		$this->order_model->delete($id);

	}
}
