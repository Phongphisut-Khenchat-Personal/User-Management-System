<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
        
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }
    
    public function create() {
        if ($this->session->userdata('role') !== 'admin') {
            echo json_encode(array('status' => 'error', 'message' => 'คุณไม่มีสิทธิ์ในการดำเนินการนี้'));
            return;
        }
        
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required|max_length[100]');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,user]');
        
        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            
            if ($this->user_model->check_username_exists($username)) {
                echo json_encode(array('status' => 'error', 'message' => 'ชื่อผู้ใช้นี้มีอยู่แล้ว'));
                return;
            }
            
            if ($this->user_model->check_email_exists($email)) {
                echo json_encode(array('status' => 'error', 'message' => 'อีเมลนี้มีอยู่แล้ว'));
                return;
            }
            
            $data = array(
                'username' => $username,
                'email' => $email,
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'full_name' => $this->input->post('full_name'),
                'role' => $this->input->post('role')
            );
            
            if ($this->user_model->create_user($data)) {
                echo json_encode(array('status' => 'success', 'message' => 'เพิ่มผู้ใช้สำเร็จ'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'เกิดข้อผิดพลาด'));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => validation_errors()));
        }
    }
    
    public function update() {
        $user_id = $this->input->post('user_id');
        $current_user_id = $this->session->userdata('user_id');
        $current_user_role = $this->session->userdata('role');
        
        // Check permission
        if ($current_user_role !== 'admin' && $current_user_id != $user_id) {
            echo json_encode(array('status' => 'error', 'message' => 'คุณไม่มีสิทธิ์ในการแก้ไขข้อมูลนี้'));
            return;
        }
        
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required|max_length[100]');
        
        if ($current_user_role === 'admin') {
            $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,user]');
        }
        
        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            
            if ($this->user_model->check_username_exists($username, $user_id)) {
                echo json_encode(array('status' => 'error', 'message' => 'ชื่อผู้ใช้นี้มีอยู่แล้ว'));
                return;
            }
            
            if ($this->user_model->check_email_exists($email, $user_id)) {
                echo json_encode(array('status' => 'error', 'message' => 'อีเมลนี้มีอยู่แล้ว'));
                return;
            }
            
            $data = array(
                'username' => $username,
                'email' => $email,
                'full_name' => $this->input->post('full_name')
            );
            
            if ($current_user_role === 'admin') {
                $data['role'] = $this->input->post('role');
            }
            
            if ($this->input->post('password')) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }
            
            if ($this->user_model->update_user($user_id, $data)) {
                echo json_encode(array('status' => 'success', 'message' => 'แก้ไขข้อมูลสำเร็จ'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'เกิดข้อผิดพลาด'));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => validation_errors()));
        }
    }
    
    public function delete() {
        if ($this->session->userdata('role') !== 'admin') {
            echo json_encode(array('status' => 'error', 'message' => 'คุณไม่มีสิทธิ์ในการดำเนินการนี้'));
            return;
        }
        
        $user_id = $this->input->post('user_id');
        $current_user_id = $this->session->userdata('user_id');
        
        if ($user_id == $current_user_id) {
            echo json_encode(array('status' => 'error', 'message' => 'คุณไม่สามารถลบบัญชีของตัวเองได้'));
            return;
        }
        
        if ($this->user_model->delete_user($user_id)) {
            echo json_encode(array('status' => 'success', 'message' => 'ลบผู้ใช้สำเร็จ'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'เกิดข้อผิดพลาด'));
        }
    }
    
    public function get_user() {
        $user_id = $this->input->post('user_id');
        $user = $this->user_model->get_user_by_id($user_id);
        
        if ($user) {
            unset($user->password); // Don't send password
            echo json_encode(array('status' => 'success', 'user' => $user));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'ไม่พบข้อมูลผู้ใช้'));
        }
    }
}
