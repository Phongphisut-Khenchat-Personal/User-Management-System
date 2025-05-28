<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->helper(array('url', 'form'));
        
        // Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }
    
    public function index() {
        // ดึงข้อมูลผู้ใช้ทั้งหมด
        $data['users'] = $this->user_model->get_all_users();
        
        // ดึงข้อมูลผู้ใช้ปัจจุบัน สำหรับแสดงรูปใน Navigation
        $current_user_id = $this->session->userdata('user_id');
        $data['current_user'] = $this->user_model->get_user_by_id($current_user_id);
        
        $this->load->view('dashboard/index', $data);
    }
}
?>
