<?php
class Register extends MY_Controller{
    function index(){
        $this->data['page_title'] = 'Đăng ký';
		$this->data['temp'] = 'frontend/register/index';
		$this->load->view('frontend/layout/index', $this->data);
    }
}