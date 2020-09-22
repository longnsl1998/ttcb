<?php
Class Login extends MY_Controller
{
    function index(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');

        if($this->input->post())
        {
            $this->form_validation->set_rules('login' ,'login', 'callback_check_login');
            if($this->form_validation->run())
            {
                $this->session->set_userdata('login', true);
                
                redirect(admin_url('home'));
            }
        }
        
        $this->load->view('admin/login/index');
    }

    /*
     * Kiem tra username va password co chinh xac khong
     */
    function check_login()
    {
        $this->load->library('session');

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password = md5($password);
        $this->load->model('user_model');
        $where = array('email' => $email , 'password' => $password);
        if($this->user_model->check_exists($where))
        {
            return true;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công');
        return false;
    }
    function logout(){
        $this->load->library('session');
		$this->session->unset_userdata('login');	// Unset session of user
        redirect(admin_url('login'));

	}
}
