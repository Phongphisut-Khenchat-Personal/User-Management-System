<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function create_user($data) {
        return $this->db->insert('users', $data);
    }
    
    public function get_user_by_username($username) {
        return $this->db->get_where('users', array('username' => $username))->row();
    }
    
    public function get_user_by_email($email) {
        return $this->db->get_where('users', array('email' => $email))->row();
    }
    
    public function get_user_by_id($id) {
        return $this->db->get_where('users', array('id' => $id))->row();
    }
    
    public function get_all_users() {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('users')->result();
    }
    
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }
    
    public function delete_user($id) {
        return $this->db->delete('users', array('id' => $id));
    }
    
    public function check_username_exists($username, $exclude_id = null) {
        $this->db->where('username', $username);
        if ($exclude_id) {
            $this->db->where('id !=', $exclude_id);
        }
        return $this->db->count_all_results('users') > 0;
    }
    
    public function check_email_exists($email, $exclude_id = null) {
        $this->db->where('email', $email);
        if ($exclude_id) {
            $this->db->where('id !=', $exclude_id);
        }
        return $this->db->count_all_results('users') > 0;
    }
}
