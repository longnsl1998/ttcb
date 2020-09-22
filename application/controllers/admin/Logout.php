<?php
class Logout extends MY_Controller{
    function index(){
        $this->load->library('session');
        $this->session->unset_userdata('login');
        redirect(admin_url('login'));

    }
}