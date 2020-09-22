<?php
class Contact extends MY_Controller{
    function index(){
        $this->data['page_title'] = 'Liên hệ';
		$this->data['temp'] = 'frontend/contact/index';
		$this->load->view('frontend/layout/index', $this->data);
    }
}