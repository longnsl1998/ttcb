<?php
class Home extends MY_Controller{
    function index(){
        $this->data['page_title'] = 'Trang quản trị';
		$this->data['temp'] = 'admin/home/index';
		$this->load->view('admin/layout/index', $this->data);
    }
}