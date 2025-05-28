<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    
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
            padding: 3rem 1rem 2rem 1rem;
        }

        .auth-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            width: 100%;
            max-width: 800px;
            padding: 3rem;
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

        /* Profile Upload Section */
        .profile-upload {
            text-align: center;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: #fafafa;
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }

        .profile-avatar {
            position: relative;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .avatar-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: var(--primary-color);
            border: 3px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 600;
            color: var(--text-light);
            overflow: hidden;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .avatar-preview:hover {
            border-color: var(--accent-color);
            background: white;
        }

        .avatar-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar-upload-btn {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 32px;
            height: 32px;
            background: var(--text-dark);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 2px solid white;
        }

        .avatar-upload-btn:hover {
            background: #495057;
            transform: scale(1.1);
        }

        .avatar-upload-btn i {
            font-size: 0.875rem;
        }

        .file-input {
            display: none;
        }

        .upload-text {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .upload-hint {
            color: var(--text-light);
            font-size: 0.8rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-dark);
            font-size: 0.875rem;
        }

        .form-label .required {
            color: #dc3545;
            margin-left: 2px;
        }

        .form-control, .form-select {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1.5px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            background: #fafafa;
        }

        .form-control:focus, .form-select:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(227, 242, 253, 0.3);
            background: white;
        }

        .form-control.is-invalid, .form-select.is-invalid {
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

        .form-text {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-top: 0.25rem;
        }

        .row {
            margin: 0 -0.75rem;
        }

        .col-md-6, .col-md-4 {
            padding: 0 0.75rem;
        }

        .col-md-3 {
            padding: 0 0.5rem;
        }

        .role-badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 500;
            margin-left: 0.5rem;
        }

        .role-admin {
            background: #d4edda;
            color: #155724;
        }

        .role-user {
            background: #fff3cd;
            color: #856404;
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
                padding: 2rem 1rem;
            }

            .auth-container {
                padding: 2rem;
            }

            .profile-upload {
                padding: 1rem;
            }

            .avatar-preview {
                width: 80px;
                height: 80px;
                font-size: 1.5rem;
            }

            .row .col-md-6, .row .col-md-4 {
                padding: 0;
                margin-bottom: 1rem;
            }

            .row .col-md-6:last-child, .row .col-md-4:last-child {
                margin-bottom: 0;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 1.5rem 1rem;
            }
            
            .auth-container {
                padding: 1.5rem;
                margin: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container fade-in">
        <div class="auth-header">
            <h1 class="auth-title">สมัครสมาชิก</h1>
            <p class="auth-subtitle">สร้างบัญชีใหม่</p>
        </div>

        <form id="registerForm">
            <!-- Profile Picture Upload -->
            <div class="profile-upload">
                <div class="profile-avatar">
                    <div class="avatar-preview" id="avatarPreview" onclick="document.getElementById('profileImageInput').click()">
                        <i class="fas fa-camera"></i>
                    </div>
                    <div class="avatar-upload-btn" onclick="document.getElementById('profileImageInput').click()">
                        <i class="fas fa-plus"></i>
                    </div>
                    <input type="file" id="profileImageInput" class="file-input" accept="image/*" name="profile_image">
                </div>
                <div class="upload-text">เพิ่มรูปโปรไฟล์</div>
                <div class="upload-hint">คลิกเพื่อเลือกรูปภาพ (ไม่บังคับ)</div>
            </div>

            <!-- ชื่อ-นามสกุล -->
            <div class="form-group">
                <label class="form-label" for="full_name">
                    ชื่อ-นามสกุล <span class="required">*</span>
                </label>
                <input type="text" class="form-control" id="full_name" name="full_name" required 
                       placeholder="กรอกชื่อ-นามสกุล" maxlength="100">
                <div class="error-message" id="full_name-error"></div>
                <div class="form-text">ชื่อและนามสกุลจริงของคุณ</div>
            </div>

            <!-- Username และ Email -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="username">
                            ชื่อผู้ใช้ <span class="required">*</span>
                        </label>
                        <input type="text" class="form-control" id="username" name="username" required 
                               placeholder="กรอกชื่อผู้ใช้" minlength="3" maxlength="50">
                        <div class="error-message" id="username-error"></div>
                        <div class="form-text">อย่างน้อย 3 ตัวอักษร</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="email">
                            อีเมล <span class="required">*</span>
                        </label>
                        <input type="email" class="form-control" id="email" name="email" required 
                               placeholder="example@domain.com" maxlength="100">
                        <div class="error-message" id="email-error"></div>
                        <div class="form-text">อีเมลที่ใช้งานได้จริง</div>
                    </div>
                </div>
            </div>

            <!-- รหัสผ่าน และ สิทธิ์ -->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="password">
                            รหัสผ่าน <span class="required">*</span>
                        </label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" required 
                                   placeholder="กรอกรหัสผ่าน" minlength="6">
                            <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                <i class="fas fa-eye" id="password-icon"></i>
                            </button>
                        </div>
                        <div class="error-message" id="password-error"></div>
                        <div class="form-text">อย่างน้อย 6 ตัวอักษร</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="confirm_password">
                            ยืนยันรหัสผ่าน <span class="required">*</span>
                        </label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required 
                                   placeholder="ยืนยันรหัสผ่าน">
                            <button type="button" class="password-toggle" onclick="togglePassword('confirm_password')">
                                <i class="fas fa-eye" id="confirm_password-icon"></i>
                            </button>
                        </div>
                        <div class="error-message" id="confirm_password-error"></div>
                        <div class="form-text">ต้องตรงกับรหัสผ่าน</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="role">
                            สิทธิ์ผู้ใช้ <span class="required">*</span>
                        </label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="">เลือกสิทธิ์</option>
                            <option value="user">👤 ผู้ใช้ทั่วไป</option>
                            <option value="admin">👑 ผู้ดูแลระบบ</option>
                        </select>
                        <div class="error-message" id="role-error"></div>
                        <div class="form-text">เลือกตามบทบาท</div>
                    </div>
                </div>
            </div>

            <!-- คำอธิบายสิทธิ์ -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded">
                            <h6 class="mb-2">👤 ผู้ใช้ทั่วไป</h6>
                            <ul class="mb-0 small text-muted">
                                <li>ดูข้อมูลผู้ใช้อื่นได้</li>
                                <li>แก้ไขโปรไฟล์ตัวเองเท่านั้น</li>
                                <li>อัพโหลดรูปโปรไฟล์</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded">
                            <h6 class="mb-2">👑 ผู้ดูแลระบบ</h6>
                            <ul class="mb-0 small text-muted">
                                <li>จัดการผู้ใช้ทั้งหมด</li>
                                <li>เพิ่ม/ลบ/แก้ไขผู้ใช้</li>
                                <li>เข้าถึงฟีเจอร์ทั้งหมด</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ปุ่มสมัครสมาชิก -->
            <button type="submit" class="btn btn-primary" id="registerBtn">
                <span class="register-text">
                    <i class="fas fa-user-plus me-2"></i>สมัครสมาชิก
                </span>
                <span class="loading">
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                    กำลังสมัครสมาชิก...
                </span>
            </button>
        </form>

        <div class="auth-footer">
            <p>มีบัญชีอยู่แล้ว? <a href="<?= base_url('login') ?>" class="auth-link">เข้าสู่ระบบ</a></p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.12/sweetalert2.min.js"></script>
    <script>
        // Global Variables
        let profileImageFile = null;

        // Global Alert Functions
        function showSuccess(message, title = 'สำเร็จ!') {
            return Swal.fire({
                icon: 'success',
                title: title,
                text: message,
                showConfirmButton: false,
                timer: 2000,
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

        // Profile Image Upload
        document.getElementById('profileImageInput').addEventListener('change', function() {
            const file = this.files[0];
            if (!file) return;

            // Validate file type
            if (!file.type.startsWith('image/')) {
                showError('กรุณาเลือกไฟล์รูปภาพเท่านั้น');
                this.value = '';
                return;
            }

            // Validate file size (max 5MB)
            if (file.size > 5 * 1024 * 1024) {
                showError('ขนาดไฟล์ต้องไม่เกิน 5MB');
                this.value = '';
                return;
            }

            profileImageFile = file;

            // Preview image
            const reader = new FileReader();
            reader.onload = function(e) {
                const avatarPreview = document.getElementById('avatarPreview');
                avatarPreview.innerHTML = `<img src="${e.target.result}" alt="Profile Preview">`;
            };
            reader.readAsDataURL(file);
        });

        // Update avatar initial when name changes
        document.getElementById('full_name').addEventListener('input', function() {
            const name = this.value.trim();
            if (name && !profileImageFile) {
                const initial = name.charAt(0).toUpperCase();
                const avatarPreview = document.getElementById('avatarPreview');
                if (!avatarPreview.querySelector('img')) {
                    avatarPreview.innerHTML = initial;
                }
            }
        });

        // Toggle password visibility
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const passwordIcon = document.getElementById(fieldId + '-icon');
            
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
        document.querySelectorAll('input, select').forEach(field => {
            field.addEventListener('input', function() {
                const errorElement = document.getElementById(this.id + '-error');
                if (errorElement) {
                    errorElement.style.display = 'none';
                }
                this.classList.remove('is-invalid');
            });
        });

        // Real-time password confirmation check
        document.getElementById('confirm_password').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            
            if (confirmPassword && password !== confirmPassword) {
                showFieldError('confirm_password', 'รหัสผ่านไม่ตรงกัน');
            } else {
                document.getElementById('confirm_password-error').style.display = 'none';
                this.classList.remove('is-invalid');
            }
        });

        // Form validation
        function validateForm() {
            let isValid = true;
            
            // Clear previous errors
            document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.form-control, .form-select').forEach(el => el.classList.remove('is-invalid'));
            
            // Required fields validation
            const requiredFields = [
                { id: 'full_name', message: 'กรุณากรอกชื่อ-นามสกุล', minLength: 2 },
                { id: 'username', message: 'กรุณากรอกชื่อผู้ใช้', minLength: 3 },
                { id: 'email', message: 'กรุณากรอกอีเมล' },
                { id: 'password', message: 'กรุณากรอกรหัสผ่าน', minLength: 6 },
                { id: 'confirm_password', message: 'กรุณายืนยันรหัสผ่าน' },
                { id: 'role', message: 'กรุณาเลือกสิทธิ์ผู้ใช้' }
            ];

            requiredFields.forEach(field => {
                const element = document.getElementById(field.id);
                const value = element.value.trim();
                
                if (!value) {
                    showFieldError(field.id, field.message);
                    isValid = false;
                } else if (field.minLength && value.length < field.minLength) {
                    showFieldError(field.id, `ต้องมีอย่างน้อย ${field.minLength} ตัวอักษร`);
                    isValid = false;
                }
            });

            // Email validation
            const email = document.getElementById('email').value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email && !emailRegex.test(email)) {
                showFieldError('email', 'รูปแบบอีเมลไม่ถูกต้อง');
                isValid = false;
            }

            // Password confirmation
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            if (password && confirmPassword && password !== confirmPassword) {
                showFieldError('confirm_password', 'รหัสผ่านไม่ตรงกัน');
                isValid = false;
            }

            // Username format (letters, numbers, underscore only)
            const username = document.getElementById('username').value.trim();
            const usernameRegex = /^[a-zA-Z0-9_]+$/;
            if (username && !usernameRegex.test(username)) {
                showFieldError('username', 'ชื่อผู้ใช้ใช้ได้เฉพาะตัวอักษร ตัวเลข และ _');
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
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form
            if (!validateForm()) {
                return;
            }
            
            const submitBtn = document.getElementById('registerBtn');
            const registerText = submitBtn.querySelector('.register-text');
            const loading = submitBtn.querySelector('.loading');
            
            // Show loading state
            registerText.style.display = 'none';
            loading.style.display = 'inline-block';
            submitBtn.disabled = true;
            
            const formData = new FormData(this);
            
            // Add profile image if selected
            if (profileImageFile) {
                formData.set('profile_image', profileImageFile);
            }
            
            fetch('<?= base_url("auth/register") ?>', {
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
                    showSuccess(data.message + ' กำลังนำคุณไปหน้าเข้าสู่ระบบ').then(() => {
                        window.location.href = '<?= base_url("login") ?>';
                    });
                } else {
                    showError(data.message || 'ไม่สามารถสมัครสมาชิกได้');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showError('ไม่สามารถเชื่อมต่อกับเซิร์ฟเวอร์ได้ กรุณาลองใหม่อีกครั้ง');
            })
            .finally(() => {
                // Hide loading state
                registerText.style.display = 'inline-block';
                loading.style.display = 'none';
                submitBtn.disabled = false;
            });
        });

        // Auto focus on first input when page loads
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('full_name').focus();
        });

        // Show role description when selected
        document.getElementById('role').addEventListener('change', function() {
            const selectedRole = this.value;
            if (selectedRole) {
                let description = '';
                if (selectedRole === 'admin') {
                    description = 'ผู้ดูแลระบบสามารถจัดการผู้ใช้ทั้งหมด เพิ่ม ลบ แก้ไขข้อมูลได้';
                } else {
                    description = 'ผู้ใช้ทั่วไปสามารถดูข้อมูลผู้อื่น และแก้ไขโปรไฟล์ตัวเองได้เท่านั้น';
                }
                
                // Show brief info (optional)
                console.log(`Selected role: ${selectedRole} - ${description}`);
            }
        });
    </script>
</body>
</html>
