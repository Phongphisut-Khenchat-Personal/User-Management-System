<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- SweetAlert2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.12/sweetalert2.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #f8f9fa;
            --secondary-color: #6c757d;
            --accent-color: #e3f2fd;
            --text-dark: #212529;
            --text-light: #6c757d;
            --border-color: #e9ecef;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 5rem 1rem 2rem 1rem;
        }

        .auth-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            padding: 3rem 2rem;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .auth-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .auth-subtitle {
            color: var(--text-light);
            font-size: 0.95rem;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-dark);
            font-size: 0.875rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1.5px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            background: #fafafa;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(227, 242, 253, 0.3);
            background: white;
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .btn-primary {
            width: 100%;
            padding: 0.875rem;
            background: var(--text-dark);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.2s ease;
            margin-top: 0.5rem;
        }

        .btn-primary:hover {
            background: #495057;
            transform: translateY(-1px);
        }

        .btn-primary:disabled {
            background: var(--secondary-color);
            transform: none;
            cursor: not-allowed;
        }

        .auth-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-color);
        }

        .auth-link {
            color: var(--text-light);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s ease;
        }

        .auth-link:hover {
            color: var(--text-dark);
            text-decoration: none;
        }

        .loading {
            display: none;
        }

        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
        }

        .input-group {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            padding: 0;
            z-index: 5;
        }

        .password-toggle:hover {
            color: var(--text-dark);
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
        }

        .fade-in {
            animation: fadeIn 0.3s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Custom SweetAlert styling */
        .swal2-container {
            align-items: flex-start !important;
            padding-top: 15vh !important;
        }
        
        .swal2-popup {
            border-radius: 12px !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1) !important;
        }
        
        .swal2-confirm {
            background: var(--text-dark) !important;
            border-radius: 8px !important;
            font-weight: 500 !important;
        }

        .swal2-show {
            animation: swal2-show-top 0.3s !important;
        }

        @keyframes swal2-show-top {
            0% {
                transform: scale(0.7) translateY(-30px);
                opacity: 0;
            }
            45% {
                transform: scale(1.05) translateY(5px);
                opacity: 1;
            }
            80% {
                transform: scale(0.95) translateY(0);
            }
            100% {
                transform: scale(1) translateY(0);
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 4rem 1rem 2rem 1rem;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 3rem 1rem 2rem 1rem;
            }
            
            .auth-container {
                padding: 2rem 1.5rem;
                margin: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container fade-in">
        <div class="auth-header">
            <h1 class="auth-title">เข้าสู่ระบบ</h1>
            <p class="auth-subtitle">ยินดีต้อนรับ</p>
        </div>

        <form id="loginForm">
            <div class="form-group">
                <label class="form-label" for="username">ชื่อผู้ใช้</label>
                <input type="text" class="form-control" id="username" name="username" required autocomplete="username" placeholder="กรอกชื่อผู้ใช้">
                <div class="error-message" id="username-error"></div>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">รหัสผ่าน</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password" placeholder="กรอกรหัสผ่าน">
                    <button type="button" class="password-toggle" onclick="togglePassword()">
                        <i class="fas fa-eye" id="password-icon"></i>
                    </button>
                </div>
                <div class="error-message" id="password-error"></div>
            </div>

            <button type="submit" class="btn btn-primary" id="loginBtn">
                <span class="login-text">เข้าสู่ระบบ</span>
                <span class="loading">
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                    กำลังเข้าสู่ระบบ...
                </span>
            </button>
        </form>

        <div class="auth-footer">
            <p>ยังไม่มีบัญชี? <a href="<?= base_url('register') ?>" class="auth-link">สมัครสมาชิก</a></p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.12/sweetalert2.min.js"></script>
    <script>
        // Global Alert Functions
        function showSuccess(message, title = 'สำเร็จ!') {
            return Swal.fire({
                icon: 'success',
                title: title,
                text: message,
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true
            });
        }

        function showError(message, title = 'เกิดข้อผิดพลาด') {
            return Swal.fire({
                icon: 'error',
                title: title,
                text: message,
                confirmButtonColor: '#212529',
                confirmButtonText: 'ตกลง'
            });
        }

        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }

        // Clear error messages when user starts typing
        document.getElementById('username').addEventListener('input', function() {
            document.getElementById('username-error').style.display = 'none';
            this.classList.remove('is-invalid');
        });

        document.getElementById('password').addEventListener('input', function() {
            document.getElementById('password-error').style.display = 'none';
            this.classList.remove('is-invalid');
        });

        // Form validation
        function validateForm() {
            let isValid = true;
            const username = document.getElementById('username');
            const password = document.getElementById('password');
            
            // Clear previous errors
            document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.form-control').forEach(el => el.classList.remove('is-invalid'));
            
            // Validate username
            if (!username.value.trim()) {
                showFieldError('username', 'กรุณากรอกชื่อผู้ใช้');
                isValid = false;
            } else if (username.value.trim().length < 3) {
                showFieldError('username', 'ชื่อผู้ใช้ต้องมีอย่างน้อย 3 ตัวอักษร');
                isValid = false;
            }
            
            // Validate password
            if (!password.value) {
                showFieldError('password', 'กรุณากรอกรหัสผ่าน');
                isValid = false;
            }
            
            return isValid;
        }

        function showFieldError(fieldName, message) {
            const field = document.getElementById(fieldName);
            const errorElement = document.getElementById(fieldName + '-error');
            
            field.classList.add('is-invalid');
            errorElement.textContent = message;
            errorElement.style.display = 'block';
        }

        // Form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form
            if (!validateForm()) {
                return;
            }
            
            const submitBtn = document.getElementById('loginBtn');
            const loginText = submitBtn.querySelector('.login-text');
            const loading = submitBtn.querySelector('.loading');
            
            // Show loading state
            loginText.style.display = 'none';
            loading.style.display = 'inline-block';
            submitBtn.disabled = true;
            
            const formData = new FormData(this);
            
            fetch('<?= base_url("auth/login") ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.status === 'success') {
                    showSuccess(data.message).then(() => {
                        window.location.href = '<?= base_url("dashboard") ?>';
                    });
                } else {
                    showError(data.message || 'ไม่สามารถเข้าสู่ระบบได้');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showError('ไม่สามารถเชื่อมต่อกับเซิร์ฟเวอร์ได้ กรุณาลองใหม่อีกครั้ง');
            })
            .finally(() => {
                // Hide loading state
                loginText.style.display = 'inline-block';
                loading.style.display = 'none';
                submitBtn.disabled = false;
            });
        });

        // Auto focus on username field when page loads
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('username').focus();
        });

        // Demo credentials hint
        console.log('Demo credentials: admin / admin123');
    </script>
</body>
</html>
