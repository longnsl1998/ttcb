<?php
class Customer extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
			$this->load->helper('date');

    }
    
    /*
     * Kiểm tra email đã tồn tại chưa
     */
    function check_email()
    {
        $email = $this->input->post('email');
        $where = array('email' => $email);
        //kiêm tra xem email đã tồn tại chưa
        if($this->customer_model->check_exists($where))
        {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
            return false;
        }
        return true;
    }
    
    /*
     * Đăng ký thành viên
     */
    function register()
    {
        //neu dang dang nhap thi chuyen ve trang thong tin thanh vien
        if($this->session->userdata('user_id_login'))
        {
            redirect(site_url('user'));
        }
        
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            // $this->form_validation->set_rules('name', 'tên ', 'required|min_length[8]');
            $this->form_validation->set_rules('email', 'Email đăng nhập', 'required|valid_email|is_unique[customers.email]');
            // $this->form_validation->set_rules('email', 'email đăng nhập', 'is_unique[customers.email]');
            // $this->form_validation->set_rules('password', 'mật khẩu', 'required|min_length[6]');
            // $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');
            // $this->form_validation->set_rules('phone', 'số điện thoại', 'required');
            // $this->form_validation->set_rules('address', 'địa chỉ', 'required');
  
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $password = $this->input->post('password');
                $password = md5($password);
                
                $data = array(
                    'name'     => $this->input->post('name'),
                    'email'    => $this->input->post('email'),
                    'gender'    => $this->input->post('gender'),
                    'phone'    => $this->input->post('phone'),
                    'address'  => $this->input->post('address'),
                    'password' => $password,
                    'created_at'  => standard_date('DATE_W3C',time())
                );
                if($this->customer_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Đăng ký thành viên thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(frontend_url('login'));
            }
        }
        
        //hiển thị ra view
        $this->data['temp'] = 'frontend/register/index';
        $this->load->view('frontend/layout/index', $this->data);
    }
    
    /*
     * Kiem tra đăng nhập
     */
    function login()
    {
        //neu dang dang nhap thi chuyen ve trang thong tin thanh vien
        if($this->session->userdata('user_id_login'))
        {
            redirect(frontend_url('home'));
        }
        
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        if($this->input->post())
        {
            $this->form_validation->set_rules('email', 'Email đăng nhập', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
            $this->form_validation->set_rules('login' ,'login', 'callback_check_login');
            if($this->form_validation->run())
            {
                //lay thong tin thanh vien
                $user = $this->_get_user_info();
                //gắn session id của thành viên đã đăng nhập
                $this->session->set_userdata('user_id_login', $user->id);
                
                $this->session->set_flashdata('message', 'Đăng nhập thành công');
                redirect(frontend_url('home'));
            }
        }
        
        //hiển thị ra view
        $this->data['temp'] = 'frontend/login/index';
        $this->load->view('frontend/layout/index', $this->data);
    }

    /*
     * Kiem tra email va password co chinh xac khong
     */
    function check_login()
    {
        $user = $this->_get_user_info();
        if($user)
        {
            return true;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công');
        return false;
    }
    
    /*
     * Lay thong tin cua thanh vien
     */
    private function _get_user_info()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password = md5($password);
        
        $where = array('email' => $email , 'password' => $password);
        $user = $this->customer_model->get_info_rule($where);
        return $user;
    }
    
    /*
     * Chinh sua thong tin thanh vien
     */
    function edit()
    {
        if(!$this->session->userdata('user_id_login'))
        {
            redirect(frontend_url('login'));
        }
        //lay thong tin cua thanh vien
        $cusid = $this->session->userdata('user_id_login');
        $customer = $this->customer_model->get_info($cusid);
        $this->data['user']  = $customer;
        

        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $password = $this->input->post('password');
            
            $this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
            $this->form_validation->set_rules('address', 'Địa chỉ', 'required');
        
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $data = array(
                    'name'     => $this->input->post('name'), 
                    'phone'    => $this->input->post('phone'),
                    'address'  => $this->input->post('address'),
                );
                if($this->customer_model->update($cusid, $data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Chỉnh sửa thông tin thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thành công');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(frontend_url('customer/info'));
            }
        }
        
        //hiển thị ra view
        $this->data['temp'] = 'frontend/customer/info';
        $this->load->view('frontend/layout/index', $this->data);
    }
    function changepw()
    {
        if(!$this->session->userdata('user_id_login'))
        {
            redirect(frontend_url('login'));
        }
        //lay thong tin cua thanh vien
        $cusid = $this->session->userdata('user_id_login');
        $customer = $this->customer_model->get_info($cusid);
        $this->data['user']  = $customer;
        
        $oldpw = $customer->password;
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
             
            $this->form_validation->set_rules('oldpassword', 'Mật khẩu cũ', 'required');
            $this->form_validation->set_rules('newpassword', 'Mật khẩu mới', 'required');
            $this->form_validation->set_rules('re-newpassword', 'Mật khẩu nhập lại', 'required|matches[newpassword]');
            $password = md5($this->input->post('oldpassword'));
            $h=levenshtein ($password,$oldpw);
            
            // print_r($h);

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                

                $data = array(
                    
                    'password'  => md5($this->input->post('newpassword'))
                );
                if($h==0)
                {
                    //tạo ra nội dung thông báo
                    
                    $this->customer_model->update($cusid, $data);
                    $this->session->unset_userdata('user_id_login');
                    redirect(frontend_url('login'));
                    $this->session->set_flashdata('message', 'Thay đổi mật khẩu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(frontend_url('customer/changepassword'));
            }
        }
        
        //hiển thị ra view
        $this->data['temp'] = 'frontend/customer/changepw';
        $this->load->view('frontend/layout/index', $this->data);

    }
    /*
     * Thong tin cua thanh vien
     */
    function info()
    {
        if(!$this->session->userdata('user_id_login'))
        {
            redirect(frontend_url('login'));
        }
        $cusid = $this->session->userdata('user_id_login');
        $customer = $this->customer_model->get_info($cusid);
        // if(!$user)
        // {
        //     redirect(frontend_url('login'));
        // }
        $this->data['customer']  = $customer;
        
        //hiển thị ra view
        $this->data['temp'] = 'frontend/customer/info';
        $this->load->view('frontend/layout/index', $this->data);
    }
    function changepassword()
    {
        if(!$this->session->userdata('user_id_login'))
        {
            redirect(frontend_url('login'));
        }
        //hiển thị ra view
        $this->data['temp'] = 'frontend/customer/changepw';
        $this->load->view('frontend/layout/index', $this->data);
    }
    function order()
    {
        if(!$this->session->userdata('user_id_login'))
        {
            redirect(frontend_url('login'));
        }
        $cusid = $this->session->userdata('user_id_login');
        $total_rows = $this->db->get_where('orders',array('customer_id'=>$cusid))->num_rows();
        // if(!$user)
        // {
        //     redirect(frontend_url('login'));
        // }
        
        //lay tong so luong ta ca cac san pham trong websit
        // $total_rows = $orders->count_all_results();
        // echo $total_rows;
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = frontend_url('customer/order'); //link hien thi ra danh sach san pham
        $config['per_page']   = 6;//so luong san pham hien thi tren 1 trang
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
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'], $segment);

        $orders = $this->db->limit($config['per_page'],$segment)->get_where('orders',array('customer_id'=>$cusid))->result();
        $this->data['orders']  = $orders;
        //hiển thị ra view
        $this->data['temp'] = 'frontend/customer/order';
        $this->load->view('frontend/layout/index', $this->data);
    }
    /*
     * Thuc hien dang xuat
     */
    function logout()
    {
        if($this->session->userdata('user_id_login'))
        {
            $this->session->unset_userdata('user_id_login');
        }
        $this->session->set_flashdata('message', 'Đăng xuất thành công');
        redirect(frontend_url('home'));
    }


}