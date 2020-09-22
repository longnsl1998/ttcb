<?php
class Shopping extends MY_Controller{
    function __construct()
	{
		parent::__construct();
        $this->load->model('product_model');
        $this->load->library('cart');
        
		
	}
    function index(){
        $this->data['page_title'] = 'Giỏ hàng';
		$this->data['temp'] = 'frontend/shopping/index';
		$this->load->view('frontend/layout/index', $this->data);
    }
    function remove($id){
        $this->cart->remove($id);
        $this->data['page_title'] = 'Giỏ hàng';
		$this->data['temp'] = 'frontend/shopping/index';
		$this->load->view('frontend/layout/index', $this->data);
    }
}