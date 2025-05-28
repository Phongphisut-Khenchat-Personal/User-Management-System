<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public function index() {
        echo "<h1 style='background: red; color: white; padding: 20px;'>WELCOME CONTROLLER</h1>";
        echo "<p>หากเห็นหน้านี้ แสดงว่า routes ยังไม่ทำงาน</p>";
        echo "<hr>";
        echo "<h3>Debug Information:</h3>";
        echo "<p>Current URL: " . current_url() . "</p>";
        echo "<p>Base URL: " . base_url() . "</p>";
        echo "<p>Auth file exists: " . (file_exists(APPPATH.'controllers/Auth.php') ? 'YES' : 'NO') . "</p>";
        echo "<hr>";
        echo "<a href='" . base_url('index.php/auth') . "'>ลองเข้า Auth โดยตรง</a>";
    }
}
