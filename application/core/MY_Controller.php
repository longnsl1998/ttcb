<?php
Class MY_Controller extends CI_Controller
{
    public $data= array();
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $controller = $this->uri->segment(1);
        switch ($controller) {
            case 'admin':
                $this->load->helper('admin');
                $this->_check_login();
                break;
            
            default:
                 $this->load->library('cart');
                 $this->load->helper('form');
        $this->load->model('category_model');

                 $input = array();
                 $categories = $this->category_model->get_list($input);
                 $message = $this->session->flashdata('message');
                 $this->data['message'] = $message;
                //kiem tra xem thanh vien da dang nhap hay chua
                $user_id_login = $this->session->userdata('user_id_login');
                $this->data['user_id_login'] = $user_id_login;
                $this->data['categories'] = $categories;

                //neu da dang nhap thi lay thong tin cua thanh vien
                if($user_id_login)
                {
                    $this->load->model('user_model');
                    $user_info = $this->user_model->get_info($user_id_login);
                    $this->data['user_info'] = $user_info;
                }
                break;
        }
    }

    /*
     * Kiem tra trang thai dang nhap cua admin
     */
    private function _check_login()
    {
        $controller = $this->uri->segment('2');
        $controller = strtolower($controller);
    
        $login = $this->session->userdata('login');
        //neu ma chua dang nhap,ma truy cap 1 controller khac login
        if(!$login && $controller != 'login')
        {
            redirect(admin_url('login'));
        }
        //neu ma admin da dang nhap thi khong cho phep vao trang login nua.
        if($login && $controller == 'login')
        {
            redirect(admin_url('home'));
        }
    }
}