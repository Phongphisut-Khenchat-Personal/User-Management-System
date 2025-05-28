<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
    }
    
    public function index() {
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }
        redirect('login');
    }
    
    public function login() {
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }
        
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if ($this->form_validation->run() == TRUE) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                
                $user = $this->user_model->get_user_by_username($username);
                
                if ($user && password_verify($password, $user->password)) {
                    $session_data = array(
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'full_name' => $user->full_name,
                        'role' => $user->role,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($session_data);
                    
                    echo json_encode(array('status' => 'success', 'message' => 'เข้าสู่ระบบสำเร็จ'));
                    return;
                } else {
                    echo json_encode(array('status' => 'error', 'message' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'));
                    return;
                }
            } else {
                echo json_encode(array('status' => 'error', 'message' => validation_errors()));
                return;
            }
        }
        
        $this->load->view('auth/login');
    }

    public function register() {
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }
        
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[50]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[100]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_rules('full_name', 'Full Name', 'required|max_length[100]');
            $this->form_validation->set_rules('role', 'Role', 'required|in_list[user,admin]');
            
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
                
                $role = $this->input->post('role');
                
                // เตรียมข้อมูลพื้นฐาน
                $data = array(
                    'username' => $username,
                    'email' => $email,
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'full_name' => $this->input->post('full_name'),
                    'role' => $role,
                    'created_at' => date('Y-m-d H:i:s')
                );
                
                // จัดการอัพโหลดรูปโปรไฟล์
                $profile_image = null;
                if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
                    // สร้างโฟลเดอร์ถ้ายังไม่มี
                    $upload_path = './uploads/profiles/';
                    if (!is_dir($upload_path)) {
                        mkdir($upload_path, 0755, true);
                    }
                    
                    // ตั้งค่าการอัพโหลด
                    $config['upload_path'] = $upload_path;
                    $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
                    $config['max_size'] = 5120; // 5MB
                    $config['max_width'] = 2000;
                    $config['max_height'] = 2000;
                    $config['encrypt_name'] = TRUE;
                    
                    $this->load->library('upload', $config);
                    
                    if ($this->upload->do_upload('profile_image')) {
                        $upload_data = $this->upload->data();
                        $profile_image = $upload_data['file_name'];
                    } else {
                        // ถ้าอัพโหลดไม่สำเร็จ แต่ไม่ใช่ error ร้ายแรง ให้ดำเนินการต่อไปโดยไม่มีรูป
                        $error = $this->upload->display_errors('', '');
                        error_log('Profile image upload failed during registration: ' . $error);
                        // ไม่ return error เพราะรูปโปรไฟล์ไม่บังคับ
                    }
                }
                
                // เพิ่มชื่อไฟล์รูปลงในข้อมูล
                if ($profile_image) {
                    $data['profile_image'] = $profile_image;
                }
                
                // บันทึกลงฐานข้อมูล
                if ($this->user_model->create_user($data)) {
                    echo json_encode(array('status' => 'success', 'message' => 'สมัครสมาชิกสำเร็จ'));
                    return;
                } else {
                    // ถ้าบันทึกฐานข้อมูลไม่สำเร็จ ให้ลบรูปที่อัพโหลดแล้ว
                    if ($profile_image && file_exists($upload_path . $profile_image)) {
                        unlink($upload_path . $profile_image);
                    }
                    echo json_encode(array('status' => 'error', 'message' => 'เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง'));
                    return;
                }
            } else {
                echo json_encode(array('status' => 'error', 'message' => strip_tags(validation_errors())));
                return;
            }
        }
        
        $this->load->view('auth/register');
    }
    
    public function logout() {
        // ล้างข้อมูล session ทั้งหมด
        $this->session->sess_destroy();
        
        // Redirect ไปหน้า login
        redirect('login');
    }
}
?>
