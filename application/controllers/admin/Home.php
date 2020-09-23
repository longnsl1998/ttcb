<?php
class Home extends MY_Controller{
    function index(){
        $this->load->model('order_model');
        $input = array();
        $total_order = $this->db->select('id')->get_where('orders',array('is_delete'=>0))->num_rows();
        $pending = $this->db->select('id')->get_where('orders',array('status'=>1))->num_rows();
        $success = $this->db->select('id')->get_where('orders',array('status'=>0))->num_rows();
        $cancel = $this->db->select('id')->get_where('orders',array('status'=>-1))->num_rows();
        $total_money = $this->db->select_sum('total')->get_where('orders',array('status'=>0))->result();
        $this->data['total'] = $total_order;
        $this->data['total_money'] = $total_money;
        $this->data['pending'] = $pending;
        $this->data['success'] = $success;
        $this->data['cancel'] = $cancel;

        // echo '<pre>';
        // print_r($total_order1);
        $this->data['page_title'] = 'Trang quản trị';
		$this->data['temp'] = 'admin/home/index';
		$this->load->view('admin/layout/index', $this->data);
    }
}