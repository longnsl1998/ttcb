<?php
Class Product extends MY_Controller{
	function __construct()
	{
		parent::__construct();
        $this->load->model('product_model');
        $this->load->model('comment_model');
			$this->load->helper('date');

        $this->load->library('cart');
		
	}

    function index(){
        $this->load->model('publisher_model');
        $this->load->model('category_model');
        $input = array();
        $categories = $this->category_model->get_list($input);
        $publishers = $this->publisher_model->get_list($input);
        $product = $this->product_model->get_list($input);
        $this->data['product'] = $product;
        $this->data['categories'] = $categories;
        $this->data['publishers'] = $publishers;
        // echo "<pre>";
        // print_r($newproduct);
        $total_rows = $this->db->get_where('products',array('is_delete'=>0))->num_rows();

        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = frontend_url('product/index'); //link hien thi ra danh sach san pham
        $config['per_page']   = 8;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
    
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        // echo "<pre>";
        // print_r($segment);
        $productSearch = $this->db->limit($config['per_page'],$segment)->get_where('products',array('is_delete'=>0))->result();
        $this->data['productSearch']  = $productSearch;
        $this->data['page_title'] = 'Tìm kiếm sản phẩm';
		$this->data['temp'] = 'frontend/product/index';
		$this->load->view('frontend/layout/index', $this->data);
		// $this->load->view('frontend/layout/product_item', $this->data);
    }
    function searchcate($id){
        $this->load->model('category_model');
        $this->load->model('publisher_model');
        $input = array();
        $categories = $this->category_model->get_list($input);
        $publishers = $this->publisher_model->get_list($input);
        $this->data['publishers'] = $publishers;
        $this->data['categories'] = $categories;
        // echo "<pre>"; print_r($product);
        $total_rows = $this->db->get_where('products',array('category_id'=>$id,'is_delete'=>0))->num_rows();

        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = frontend_url('product/searchcate/'.$id); //link hien thi ra danh sach san pham
        $config['per_page']   = 8;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 5;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
    
        $segment = $this->uri->segment(5);
        $segment = intval($segment);
        // echo "<pre>";
        // print_r($segment);
        $productSearch = $this->db->limit($config['per_page'],$segment)->get_where('products',array('category_id'=>$id,'is_delete'=>0))->result();
        $this->data['productSearch']  = $productSearch;
        $this->data['page_title'] = 'Tìm kiếm sản phẩm';
		$this->data['temp'] = 'frontend/product/index';
		$this->load->view('frontend/layout/index', $this->data);
    }
    
    function searchpub($id){
        $this->load->model('category_model');
        $this->load->model('publisher_model');
        $input = array();
        $categories = $this->category_model->get_list($input);
        $publishers = $this->publisher_model->get_list($input);
        
        $this->data['publishers'] = $publishers;
        $this->data['categories'] = $categories;
        // echo "<pre>"; print_r($product);
        $total_rows = $this->db->get_where('products',array('publisher_id'=>$id,'is_delete'=>0))->num_rows();

        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = frontend_url('product/searchpub/'.$id); //link hien thi ra danh sach san pham
        $config['per_page']   = 8;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 5;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
    
        $segment = $this->uri->segment(5);
        $segment = intval($segment);
        // echo "<pre>";
        // print_r($segment);
        $productSearch = $this->db->limit($config['per_page'],$segment)->get_where('products',array('publisher_id'=>$id,'is_delete'=>0))->result();
        $this->data['productSearch']  = $productSearch;
        $this->data['page_title'] = 'Tìm kiếm sản phẩm';
		$this->data['temp'] = 'frontend/product/index';
		$this->load->view('frontend/layout/index', $this->data);
    }
    function search($id){
        $this->load->model('comment_model');
        $this->load->model('customer_model');
        // $this->load->model('publisher_model');
        // $input = array();
        // $categories = $this->category_model->get_list($input);
        // $publishers = $this->publisher_model->get_list($input);
        $comments = $this->db->get_where('comments',array('product_id'=>$id))->result();
        $product = $this->product_model->get_info($id);
        $this->data['product'] = $product;
        $this->data['comments'] = $comments;
        // $this->data['publishers'] = $publishers;
        // $this->data['categories'] = $categories;
        // echo "<pre>"; print_r($product);
        $this->data['page_title'] = 'Tìm kiếm sản phẩm';
		$this->data['temp'] = 'frontend/product_detail/index';
		$this->load->view('frontend/layout/index', $this->data);
    }
    function addtocart($id){
        $this->load->library('cart');

        $product = $this->db->select('qty')->get_where('products',array('id'=>$id))->result();
        $name = $this->db->select('name')->get_where('products',array('id'=>$id))->result();
        $price = $this->db->select('price')->get_where('products',array('id'=>$id))->result();
        $picture = $this->db->select('picture')->get_where('products',array('id'=>$id))->result();
        $data  =  array ( 
            'id'       =>  $id , 
            'qty'      =>  1 , 
            'picture'      =>  $picture[0]->picture , 
            'price'    =>  $price[0]->price , 
            'name'     =>  $name[0]->name , 
            
		);
		$productqty=0;
		foreach($this->cart->contents() as $item){
			if($item['id']==$id){
				$productqty=$item['qty'];
			}
		}
		if($product[0]->qty>$productqty){
			$this->cart->insert($data);
			// $data1 = $this->cart->contents();
			$this->session->set_flashdata('message', 'Thêm sản phẩm vào giỏ thành công');
		}else{
			$this->session->set_flashdata('message', 'Sản phẩm không đủ hàng để thêm vào giỏ');
			redirect(frontend_url('home'));
		}
       
        // echo "<pre>"; print_r($data1);
		redirect(frontend_url('home'));
        

    }
    function searchproduct(){
        $this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->model('publisher_model');
        $this->load->model('category_model');
        $input = array();
        $categories = $this->category_model->get_list($input);
        $publishers = $this->publisher_model->get_list($input);
        $namesearch = $this->input->post('name');
        $this->data['categories'] = $categories;
        $this->data['publishers'] = $publishers;
        // echo "<pre>";
        // print_r($namesearch);
        if($namesearch){
            $total_rows = $this->db->like('name',$namesearch)->get_where('products',array('is_delete' =>0))->num_rows();

        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = frontend_url('product/searchproduct'); //link hien thi ra danh sach san pham
        $config['per_page']   = 8;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
    
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        // echo "<pre>";
        // print_r($segment);
            $productSearch= $this->db->limit($config['per_page'],$segment)->like('name',$namesearch)->get_where('products',array('is_delete' =>0))->result();
            $this->data['productSearch']  = $productSearch;
        //     echo "<pre>";
        // print_r($productSearch);
            $this->data['page_title'] = 'Tìm kiếm sản phẩm';
            $this->data['temp'] = 'frontend/product/index';
            $this->load->view('frontend/layout/index', $this->data);    
        }else{
		redirect(frontend_url('product'));

        }
    }
    function addcomment(){
        if(!$this->session->userdata('user_id_login'))
        {
            redirect(frontend_url('login'));
        }
		//neu ma co du lieu post len thi kiem tra
		if($this->input->post())
		{
			//load thư viện validate dữ liệu
			$this->load->library('form_validation');
			$this->load->helper('form');

			$this->form_validation->set_rules('content', 'Nội dung', 'required');

			//nhập liệu chính xác
			if($this->form_validation->run())
			{
				//them vao csdl
				$content = $this->input->post('content');
                $product_id = $this->input->post('product_id');
                $customer_id = $this->session->userdata('user_id_login');
				//luu du lieu can them
				$data = array(
					'content'      => $content,
					'product_id'      => $product_id,
                    'customer_id'      => $customer_id,
                    'created_at' => standard_date('DATE_W3C',time())
                    
				);
				//them moi vao csdl
				if($this->comment_model->create($data))
				{
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Bình luận sản phẩm thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thể bình luận sản phẩm');
				}
				//chuyen tới trang danh sách
				redirect(frontend_url('product/search/').$product_id);
			}
		}

		$this->data['page_title'] = 'Chi tiết sản phẩm';
		$this->data['temp'] = 'frontend/product_detail/index';
		$this->load->view('frontend/layout/index', $this->data);
	}
}
