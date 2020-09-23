<?php
class Checkout extends MY_Controller{
    function __construct()
	{
		parent::__construct();
        $this->load->model('product_model');
        $this->load->model('order_model');
        $this->load->model('customer_model');
        $this->load->model('orderdetail_model');
        $this->load->library('cart');
        
		
	}
    function index(){
        $this->data['page_title'] = 'Đặt hàng';
		$this->data['temp'] = 'frontend/checkout/index';
		if($this->session->userdata('user_id_login'))
        {
			$info = $this->customer_model->get_info($this->session->userdata('user_id_login'));
			$infodata = array(
				'name'      => $info->name,
				'email'      => $info->email,
				'phone'      => $info->phone,
				'address'      => $info->address
			);
			$this->data['info'] = $infodata;

		}
		$this->load->view('frontend/layout/index', $this->data);
    }
    function addorder(){

		//neu ma co du lieu post len thi kiem tra
		if($this->input->post())
		{
			//load thư viện validate dữ liệu
			$this->load->library('form_validation');
			$this->load->library('cart');
			$this->load->helper('form');
			$this->load->helper('date');

			$this->form_validation->set_rules('name', 'Tên', 'required');
			if($this->session->userdata('user_id_login'))
        	{
				$customer_id = $this->session->userdata('user_id_login');
			}else{
				$customer_id = 0;
			}
			//nhập liệu chính xác
			if($this->form_validation->run())
			{
				//them vao csdl
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address');
				$type = $this->input->post('type');
				$note = $this->input->post('note');
                $total = $this->cart->total();
                $created_at = standard_date('DATE_W3C',time());
				
				//luu du lieu can them
				$data = array(
					'name'      => $name,
					'email'      => $email,
					'customer_id'      => $customer_id,
					'phone'      => $phone,
					'address'      => $address,
					'type'      => 1,
					'status'      => 1,
					'note'      => $note,
					'total'      => $total,
					'created_at'      => $created_at,
                );
                // echo "<pre>";
                // print_r($this->cart->contents());
				//them moi vao csdl
				if($this->order_model->create($data))
				{
                    $order=$this->db->get_where('orders',$data)->result();
                    $id=$order[0]->id;
                    foreach ($this->cart->contents() as $key => $item) {
                        $data = array(
                            'order_id'=>$id,
                            'product_id'=>$item['id'],
                            'qty'=>$item['qty'],
                            'price'=>$item['price'],
                            'created_at'=>standard_date('DATE_W3C',time())
                        );
                    }
                    $this->orderdetail_model->create($data);
                    //tạo ra nội dung thông báo
                    $this->cart->destroy();
					$this->session->set_flashdata('message', 'Đặt hàng thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
                //chuyen tới trang danh sách

                // echo "<pre>";
                // print_r($order);
				redirect(frontend_url('home'));
			}
		}
        
		$this->data['page_title'] = 'Đặt hàng';
		$this->data['temp'] = 'frontend/checkout/index';
		$this->load->view('frontend/layout/index', $this->data);
	}
}