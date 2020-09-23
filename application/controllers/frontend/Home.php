<?php
class Home extends MY_Controller{
    function __construct()
	{
		parent::__construct();
        $this->load->model('product_model');
        $this->load->library('cart');
        
		
	}
    function index(){
        $input = array();
        $this->load->model('category_model');
        $categories = $this->category_model->get_list($input);

		$input = array();
        // $product = $this->product_model->get_list($input);
        
        $newproduct = $this->db->select('*')->order_by('created_at', 'decs')->limit(4)->get('products')->result();
        
        // $this->data['product'] = $product;
        $this->data['newproduct'] = $newproduct;
        $this->data['categories'] = $categories;
        // echo "<pre>";
        // print_r($newproduct);
        $total_rows = $this->db->get_where('products',array('is_delete'=>0))->num_rows();

        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = frontend_url('home/index'); //link hien thi ra danh sach san pham
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
        $product = $this->db->limit($config['per_page'],$segment)->get_where('products',array('is_delete'=>0))->result();
        $this->data['product']  = $product;


        $this->data['page_title'] = 'Trang chủ';
		$this->data['temp'] = 'frontend/home/index';
		$this->load->view('frontend/layout/index', $this->data);
		// $this->load->view('frontend/layout/product_item', $this->data);
    }
    
}