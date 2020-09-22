<?php
class Login extends MY_Controller{
    function index(){
        $this->data['page_title'] = 'Đăng nhập';
		$this->data['temp'] = 'frontend/login/index';
		$this->load->view('frontend/layout/index', $this->data);
    }
}