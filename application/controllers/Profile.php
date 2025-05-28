<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        
        // Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }
    
    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->user_model->get_user_by_id($user_id);
        
        if (!$data['user']) {
            redirect('login');
        }
        
        $this->load->view('profile/index', $data);
    }
    
    public function update() {
        $user_id = $this->session->userdata('user_id');
        
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required|max_length[100]');
        
        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            
            // Check if username exists (excluding current user)
            if ($this->user_model->check_username_exists($username, $user_id)) {
                echo json_encode(array('status' => 'error', 'message' => 'ชื่อผู้ใช้นี้มีอยู่แล้ว'));
                return;
            }
            
            // Check if email exists (excluding current user)
            if ($this->user_model->check_email_exists($email, $user_id)) {
                echo json_encode(array('status' => 'error', 'message' => 'อีเมลนี้มีอยู่แล้ว'));
                return;
            }
            
            $data = array(
                'username' => $username,
                'email' => $email,
                'full_name' => $this->input->post('full_name')
            );
            
            // Update password if provided
            $password = $this->input->post('password');
            if (!empty($password)) {
                if (strlen($password) < 6) {
                    echo json_encode(array('status' => 'error', 'message' => 'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร'));
                    return;
                }
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }
            
            if ($this->user_model->update_user($user_id, $data)) {
                // Update session data
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('full_name', $this->input->post('full_name'));
                
                // Get updated user data
                $updated_user = $this->user_model->get_user_by_id($user_id);
                
                echo json_encode(array(
                    'status' => 'success', 
                    'message' => 'บันทึกข้อมูลสำเร็จ',
                    'user' => array(
                        'full_name' => $updated_user->full_name,
                        'username' => $updated_user->username,
                        'email' => $updated_user->email
                    )
                ));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล'));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => strip_tags(validation_errors())));
        }
    }
    
    public function upload_image() {
        $user_id = $this->session->userdata('user_id');
        
        if (!isset($_FILES['profile_image']) || $_FILES['profile_image']['error'] !== UPLOAD_ERR_OK) {
            echo json_encode(array('status' => 'error', 'message' => 'ไม่พบไฟล์หรือเกิดข้อผิดพลาดในการอัพโหลด'));
            return;
        }
        
        // Create upload directory if not exists
        $upload_path = './uploads/profiles/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0755, true);
        }
        
        // Configure upload
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
        $config['max_size'] = 5120; // 5MB
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;
        $config['encrypt_name'] = TRUE;
        
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload('profile_image')) {
            $upload_data = $this->upload->data();
            
            // Get current user data to delete old image
            $current_user = $this->user_model->get_user_by_id($user_id);
            
            // Delete old profile image if exists
            if (!empty($current_user->profile_image)) {
                $old_image_path = $upload_path . $current_user->profile_image;
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
            
            // Update database with new image filename
            $update_data = array('profile_image' => $upload_data['file_name']);
            
            if ($this->user_model->update_user($user_id, $update_data)) {
                echo json_encode(array(
                    'status' => 'success',
                    'message' => 'อัพโหลดรูปโปรไฟล์สำเร็จ',
                    'image_url' => base_url('uploads/profiles/' . $upload_data['file_name'])
                ));
            } else {
                // If database update fails, delete uploaded file
                unlink($upload_path . $upload_data['file_name']);
                echo json_encode(array('status' => 'error', 'message' => 'ไม่สามารถบันทึกข้อมูลรูปภาพได้'));
            }
        } else {
            $error = $this->upload->display_errors('', '');
            
            // Translate common upload errors to Thai
            $error_messages = array(
                'The filetype you are attempting to upload is not allowed.' => 'ประเภทไฟล์ที่อัพโหลดไม่ได้รับอนุญาต',
                'The file you are attempting to upload is larger than the permitted size.' => 'ไฟล์มีขนาดใหญ่เกินที่อนุญาต',
                'The image you are attempting to upload doesn\'t fit into the allowed dimensions.' => 'ขนาดรูปภาพไม่อยู่ในช่วงที่อนุญาต',
                'No file selected.' => 'กรุณาเลือกไฟล์'
            );
            
            foreach ($error_messages as $en => $th) {
                if (strpos($error, $en) !== false) {
                    $error = $th;
                    break;
                }
            }
            
            echo json_encode(array('status' => 'error', 'message' => $error));
        }
    }
    
    public function delete_image() {
        $user_id = $this->session->userdata('user_id');
        
        // Get current user data
        $current_user = $this->user_model->get_user_by_id($user_id);
        
        if (!empty($current_user->profile_image)) {
            $image_path = './uploads/profiles/' . $current_user->profile_image;
            
            // Delete file from server
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            
            // Update database
            $update_data = array('profile_image' => null);
            
            if ($this->user_model->update_user($user_id, $update_data)) {
                echo json_encode(array('status' => 'success', 'message' => 'ลบรูปโปรไฟล์สำเร็จ'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'ไม่สามารถลบรูปโปรไฟล์ได้'));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'ไม่พบรูปโปรไฟล์'));
        }
    }
}
