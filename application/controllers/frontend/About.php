<?php
class About extends MY_Controller{
    function index(){
        $this->data['page_title'] = 'Giới thiệu';
		$this->data['temp'] = 'frontend/about/index';
		$this->load->view('frontend/layout/index', $this->data);
    }
}