<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์ของฉัน</title>
    
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
            background: var(--primary-color);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .navbar {
            background: white;
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.25rem;
            color: var(--text-dark);
        }

        .nav-link {
            color: var(--text-light);
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--text-dark);
            background: var(--primary-color);
        }

        .nav-avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            overflow: hidden;
            border: 1px solid var(--border-color);
            background: var(--primary-color);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            vertical-align: middle;
        }

        .nav-avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .nav-avatar-placeholder {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-light);
        }

        .main-content {
            padding: 2rem 0;
            min-height: calc(100vh - 76px);
        }

        .profile-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .profile-header {
            padding: 2rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .avatar-container {
            position: relative;
        }

        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--primary-color);
            border: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-light);
            overflow: hidden;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-details h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: var(--text-dark);
        }

        .user-details p {
            color: var(--text-light);
            margin: 0;
            font-size: 0.95rem;
        }

        .role-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
            background: var(--primary-color);
            color: var(--text-light);
            border: 1px solid var(--border-color);
            margin-top: 0.5rem;
        }

        .role-admin {
            background: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .btn-edit {
            background: var(--text-dark);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-edit:hover {
            background: #495057;
            color: white;
            transform: translateY(-1px);
        }

        .profile-body {
            padding: 2rem;
        }

        .info-section {
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .info-item {
            background: #fafafa;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 1rem;
            transition: all 0.2s ease;
        }

        .info-item:hover {
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .info-label {
            font-size: 0.85rem;
            color: var(--text-light);
            font-weight: 500;
            margin-bottom: 0.25rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 1rem;
            font-weight: 500;
            color: var(--text-dark);
            word-break: break-all;
        }

        .info-value.empty {
            color: var(--text-light);
            font-style: italic;
        }

        .edit-mode {
            display: none;
        }

        .edit-mode.active {
            display: block;
        }

        .view-mode.hidden {
            display: none;
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

        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            border-radius: 8px;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--text-dark);
            color: white;
        }

        .btn-primary:hover {
            background: #495057;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: transparent;
            color: var(--text-light);
            border: 1.5px solid var(--border-color);
        }

        .btn-secondary:hover {
            background: var(--primary-color);
            color: var(--text-dark);
        }

        .loading {
            display: none;
        }

        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 1rem 0;
            }

            .profile-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .profile-info {
                flex-direction: column;
                gap: 1rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .btn-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('dashboard') ?>">
                <i class="fas fa-users me-2"></i>
                UserManagement
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <div class="nav-avatar me-2">
                                <?php if (isset($user->profile_image) && $user->profile_image): ?>
                                    <img src="<?= base_url('uploads/profiles/' . $user->profile_image) ?>" alt="Profile" class="nav-avatar-img">
                                <?php else: ?>
                                    <div class="nav-avatar-placeholder">
                                        <?= strtoupper(substr($this->session->userdata('full_name'), 0, 1)) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?= $this->session->userdata('full_name') ?>
                            <span class="badge bg-<?= $this->session->userdata('role') == 'admin' ? 'success' : 'primary' ?> ms-1">
                                <?= $this->session->userdata('role') == 'admin' ? 'Admin' : 'User' ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item active" href="<?= base_url('profile') ?>">
                                <i class="fas fa-user me-2"></i> โปรไฟล์
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                                <i class="fas fa-sign-out-alt me-2"></i> ออกจากระบบ
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="profile-container">
                        <!-- Profile Header -->
                        <div class="profile-header">
                            <div class="profile-info">
                                <div class="avatar-container">
                                    <?php if (isset($user->profile_image) && $user->profile_image): ?>
                                        <div class="avatar">
                                            <img src="<?= base_url('uploads/profiles/' . $user->profile_image) ?>" alt="Profile">
                                        </div>
                                    <?php else: ?>
                                        <div class="avatar">
                                            <?= strtoupper(substr($user->full_name ?? 'U', 0, 1)) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="user-details">
                                    <h2><?= htmlspecialchars($user->full_name ?? 'ไม่ระบุชื่อ') ?></h2>
                                    <p>@<?= htmlspecialchars($user->username ?? 'unknown') ?></p>
                                    <span class="role-badge <?= ($user->role ?? 'user') === 'admin' ? 'role-admin' : '' ?>">
                                        <?= ($user->role ?? 'user') === 'admin' ? '👑 ผู้ดูแลระบบ' : '👤 ผู้ใช้ทั่วไป' ?>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="view-mode" id="viewMode">
                                <button type="button" class="btn-edit" onclick="toggleEditMode()">
                                    <i class="fas fa-edit me-2"></i>แก้ไขโปรไฟล์
                                </button>
                            </div>
                        </div>

                        <!-- Profile Body -->
                        <div class="profile-body">
                            <!-- View Mode -->
                            <div class="view-mode" id="viewContent">
                                <!-- Basic Information -->
                                <div class="info-section">
                                    <h4 class="section-title">ข้อมูลพื้นฐาน</h4>
                                    <div class="info-grid">
                                        <div class="info-item">
                                            <div class="info-label">ชื่อ-นามสกุล</div>
                                            <div class="info-value"><?= htmlspecialchars($user->full_name ?? 'ไม่ระบุ') ?></div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-label">ชื่อผู้ใช้</div>
                                            <div class="info-value"><?= htmlspecialchars($user->username ?? 'ไม่ระบุ') ?></div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-label">อีเมล</div>
                                            <div class="info-value"><?= htmlspecialchars($user->email ?? 'ไม่ระบุ') ?></div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-label">สิทธิ์ผู้ใช้</div>
                                            <div class="info-value">
                                                <?= ($user->role ?? 'user') === 'admin' ? 'ผู้ดูแลระบบ' : 'ผู้ใช้ทั่วไป' ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Mode -->
                            <div class="edit-mode" id="editContent">
                                <form id="profileForm">
                                    <!-- Avatar Upload -->
                                    <div class="info-section">
                                        <h4 class="section-title">รูปโปรไฟล์</h4>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-container">
                                                <div class="avatar" id="avatarPreview">
                                                    <?php if (isset($user->profile_image) && $user->profile_image): ?>
                                                        <img src="<?= base_url('uploads/profiles/' . $user->profile_image) ?>" alt="Profile">
                                                    <?php else: ?>
                                                        <?= strtoupper(substr($user->full_name ?? 'U', 0, 1)) ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-secondary me-2" onclick="document.getElementById('profileImageInput').click()">
                                                    <i class="fas fa-camera me-2"></i>เปลี่ยนรูป
                                                </button>
                                                <?php if (isset($user->profile_image) && $user->profile_image): ?>
                                                <button type="button" class="btn btn-outline-danger" onclick="deleteProfileImage()">
                                                    <i class="fas fa-trash me-2"></i>ลบรูป
                                                </button>
                                                <?php endif; ?>
                                                <input type="file" id="profileImageInput" style="display: none;" accept="image/*">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Basic Information -->
                                    <div class="info-section">
                                        <h4 class="section-title">ข้อมูลพื้นฐาน</h4>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="full_name">ชื่อ-นามสกุล</label>
                                            <input type="text" class="form-control" id="full_name" name="full_name" 
                                                   value="<?= htmlspecialchars($user->full_name ?? '') ?>" required>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="username">ชื่อผู้ใช้</label>
                                                    <input type="text" class="form-control" id="username" name="username" 
                                                           value="<?= htmlspecialchars($user->username ?? '') ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="email">อีเมล</label>
                                                    <input type="email" class="form-control" id="email" name="email" 
                                                           value="<?= htmlspecialchars($user->email ?? '') ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Security -->
                                    <div class="info-section">
                                        <h4 class="section-title">เปลี่ยนรหัสผ่าน</h4>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="password">รหัสผ่านใหม่</label>
                                                    <input type="password" class="form-control" id="password" name="password" 
                                                           placeholder="เว้นว่างหากไม่ต้องการเปลี่ยน">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="confirm_password">ยืนยันรหัสผ่าน</label>
                                                    <input type="password" class="form-control" id="confirm_password" 
                                                           placeholder="ยืนยันรหัสผ่านใหม่">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary" onclick="toggleEditMode()">
                                            <i class="fas fa-times me-2"></i>ยกเลิก
                                        </button>
                                        <button type="submit" class="btn btn-primary" id="saveBtn">
                                            <span class="save-text">
                                                <i class="fas fa-save me-2"></i>บันทึกการเปลี่ยนแปลง
                                            </span>
                                            <span class="loading">
                                                <span class="spinner-border spinner-border-sm me-2"></span>
                                                กำลังบันทึก...
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

        // Toggle Edit Mode
        function toggleEditMode() {
            const viewMode = document.querySelectorAll('.view-mode');
            const editMode = document.querySelectorAll('.edit-mode');
            
            viewMode.forEach(element => {
                element.classList.toggle('hidden');
            });
            
            editMode.forEach(element => {
                element.classList.toggle('active');
            });
        }

        // Profile Image Upload
        document.getElementById('profileImageInput').addEventListener('change', function() {
            const file = this.files[0];
            if (!file) return;

            // Validate file
            if (!file.type.startsWith('image/')) {
                showError('กรุณาเลือกไฟล์รูปภาพเท่านั้น');
                return;
            }

            if (file.size > 5 * 1024 * 1024) {
                showError('ขนาดไฟล์ต้องไม่เกิน 5MB');
                return;
            }

            // Preview image
            const reader = new FileReader();
            reader.onload = function(e) {
                const avatarPreview = document.getElementById('avatarPreview');
                avatarPreview.innerHTML = `<img src="${e.target.result}" alt="Profile">`;
            };
            reader.readAsDataURL(file);

            // Upload file
            const formData = new FormData();
            formData.append('profile_image', file);

            fetch('<?= base_url("profile/upload_image") ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    showSuccess(data.message);
                    // Update all avatar elements including navigation
                    document.querySelectorAll('.avatar').forEach(avatar => {
                        avatar.innerHTML = `<img src="${data.image_url}" alt="Profile">`;
                    });
                    
                    // Update navigation avatar
                    const navAvatar = document.querySelector('.nav-avatar');
                    if (navAvatar) {
                        navAvatar.innerHTML = `<img src="${data.image_url}" alt="Profile" class="nav-avatar-img">`;
                    }
                } else {
                    showError(data.message || 'ไม่สามารถอัพโหลดรูปภาพได้');
                }
            })
            .catch(error => {
                showError('เกิดข้อผิดพลาดในการอัพโหลด');
            });
        });

        // Delete Profile Image
        function deleteProfileImage() {
            Swal.fire({
                title: 'ยืนยันการลบ',
                text: 'คุณต้องการลบรูปโปรไฟล์หรือไม่?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'ลบ',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('<?= base_url("profile/delete_image") ?>', {
                        method: 'POST'
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            showSuccess(data.message);
                            // Reset avatar to initial
                            const userInitial = '<?= strtoupper(substr($user->full_name ?? "U", 0, 1)) ?>';
                            document.querySelectorAll('.avatar').forEach(avatar => {
                                avatar.innerHTML = userInitial;
                            });
                            
                            // Reset navigation avatar
                            const navAvatar = document.querySelector('.nav-avatar');
                            if (navAvatar) {
                                navAvatar.innerHTML = `<div class="nav-avatar-placeholder">${userInitial}</div>`;
                            }
                            // Hide delete button
                            location.reload();
                        } else {
                            showError(data.message || 'ไม่สามารถลบรูปภาพได้');
                        }
                    })
                    .catch(error => {
                        showError('เกิดข้อผิดพลาดในการลบรูปภาพ');
                    });
                }
            });
        }

        // Form Validation and Submission
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate password confirmation
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            
            if (password && password !== confirmPassword) {
                showError('รหัสผ่านไม่ตรงกัน');
                return;
            }
            
            const saveBtn = document.getElementById('saveBtn');
            const saveText = saveBtn.querySelector('.save-text');
            const loading = saveBtn.querySelector('.loading');
            
            // Show loading
            saveText.style.display = 'none';
            loading.style.display = 'inline-block';
            saveBtn.disabled = true;
            
            const formData = new FormData(this);
            
            fetch('<?= base_url("profile/update") ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    showSuccess(data.message).then(() => {
                        // Update view mode with new data
                        if (data.user) {
                            // Update all display elements
                            document.querySelector('.user-details h2').textContent = data.user.full_name;
                            document.querySelector('.user-details p').textContent = '@' + data.user.username;
                            
                            // Update info items
                            const infoItems = document.querySelectorAll('.info-value');
                            infoItems[0].textContent = data.user.full_name;
                            infoItems[1].textContent = data.user.username;
                            infoItems[2].textContent = data.user.email;
                        }
                        
                        // Switch back to view mode
                        toggleEditMode();
                    });
                } else {
                    showError(data.message || 'ไม่สามารถบันทึกข้อมูลได้');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showError('ไม่สามารถเชื่อมต่อกับเซิร์ฟเวอร์ได้ กรุณาลองใหม่อีกครั้ง');
            })
            .finally(() => {
                // Hide loading
                saveText.style.display = 'inline-block';
                loading.style.display = 'none';
                saveBtn.disabled = false;
            });
        });

        // Clear form validation on input
        document.querySelectorAll('input').forEach(field => {
            field.addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });
        });
    </script>
</body>
</html>
