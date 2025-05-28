<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แดชบอร์ด - จัดการผู้ใช้</title>
    
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
            --success-color: #d4edda;
            --warning-color: #fff3cd;
            --info-color: #d1ecf1;
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

        /* Navigation */
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

        /* Main Content */
        .main-content {
            padding: 2rem 0;
            min-height: calc(100vh - 76px);
        }

        /* Cards */
        .card {
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
            background: white;
            transition: all 0.2s ease;
        }

        .card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Statistics Cards - สีไม่ฉูดฉาด */
        .stats-card {
            text-align: center;
            padding: 2rem 1.5rem;
            border-radius: 12px;
            transition: all 0.2s ease;
            border: 1px solid var(--border-color);
        }

        .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stats-label {
            color: var(--text-light);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .stats-total { 
            background: white;
            color: var(--text-dark);
        }
        
        .stats-total .stats-icon {
            background: #f8f9fa;
            color: #495057;
        }
        
        .stats-admin { 
            background: white;
            color: var(--text-dark);
        }
        
        .stats-admin .stats-icon {
            background: #fff3cd;
            color: #856404;
        }
        
        .stats-user { 
            background: white;
            color: var(--text-dark);
        }
        
        .stats-user .stats-icon {
            background: #d1ecf1;
            color: #0c5460;
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: var(--text-dark);
            border: var(--text-dark);
        }

        .btn-primary:hover {
            background: #495057;
            transform: translateY(-1px);
        }

        .btn-outline-primary {
            color: var(--text-dark);
            border-color: var(--border-color);
        }

        .btn-outline-primary:hover {
            background: var(--text-dark);
            border-color: var(--text-dark);
        }

        .btn-sm {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
        }

        /* Table */
        .table {
            margin: 0;
        }

        .table th {
            background: var(--primary-color);
            border: none;
            font-weight: 600;
            color: var(--text-dark);
            padding: 1rem;
            font-size: 0.875rem;
        }

        .table td {
            padding: 1rem;
            border-color: var(--border-color);
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: #fafbfc;
        }

        /* Avatar */
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border-color);
        }

        .avatar-placeholder {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-weight: 600;
            border: 2px solid var(--border-color);
        }

        /* Badges - สีไม่ฉูดฉาด */
        .badge {
            font-weight: 500;
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
        }

        .badge.bg-success {
            background: #f8f9fa !important;
            color: #495057 !important;
            border: 1px solid #dee2e6;
        }

        .badge.bg-primary {
            background: #f8f9fa !important;
            color: #495057 !important;
            border: 1px solid #dee2e6;
        }

        /* Button disabled state */
        .btn:disabled {
            opacity: 0.3;
        }

        /* User info */
        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .user-details h6 {
            margin: 0;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .user-details p {
            margin: 0;
            color: var(--text-light);
            font-size: 0.875rem;
        }

        .user-indicator {
            font-weight: 600;
            color: #0d6efd;
        }

        /* Controls */
        .controls-section {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .search-filters {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-box {
            max-width: 300px;
        }

        /* Modal */
        .modal-content {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 600;
            font-size: 1.25rem;
        }

        .modal-body {
            padding: 1.5rem;
            max-height: 70vh;
            overflow-y: auto;
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
            padding: 1.5rem;
        }

        /* Form Elements */
        .form-label {
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-label .required {
            color: #dc3545;
            margin-left: 2px;
        }

        .form-control, .form-select {
            border: 1.5px solid var(--border-color);
            border-radius: 8px;
            padding: 0.75rem;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            background: #fafafa;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(227, 242, 253, 0.3);
            background: white;
        }

        .form-control.is-invalid, .form-select.is-invalid {
            border-color: #dc3545;
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

        /* Loading */
        .loading {
            display: none;
        }

        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
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

        .swal2-cancel {
            border-radius: 8px !important;
            font-weight: 500 !important;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                padding: 1rem 0;
            }
            
            .controls-section {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-filters {
                justify-content: space-between;
            }
            
            .search-box {
                max-width: none;
                flex: 1;
            }
            
            .table-responsive {
                font-size: 0.875rem;
            }

            .stats-card {
                padding: 1.5rem 1rem;
            }

            .stats-number {
                font-size: 1.5rem;
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
                                <?php if (isset($current_user->profile_image) && $current_user->profile_image): ?>
                                    <img src="<?= base_url('uploads/profiles/' . $current_user->profile_image) ?>" alt="Profile" class="nav-avatar-img">
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
                            <li><a class="dropdown-item" href="<?= base_url('profile') ?>">
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
            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <div class="card stats-card stats-total">
                        <div class="stats-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stats-number" id="totalUsers"><?= count($users) ?></div>
                        <div class="stats-label">ผู้ใช้ทั้งหมด</div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card stats-card stats-admin">
                        <div class="stats-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="stats-number" id="adminUsers">
                            <?php 
                            $adminCount = 0;
                            foreach($users as $user) {
                                if($user->role == 'admin') $adminCount++;
                            }
                            echo $adminCount;
                            ?>
                        </div>
                        <div class="stats-label">ผู้ดูแลระบบ</div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card stats-card stats-user">
                        <div class="stats-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="stats-number" id="regularUsers">
                            <?php 
                            $userCount = 0;
                            foreach($users as $user) {
                                if($user->role == 'user') $userCount++;
                            }
                            echo $userCount;
                            ?>
                        </div>
                        <div class="stats-label">ผู้ใช้ทั่วไป</div>
                    </div>
                </div>
            </div>

            <!-- Users Management -->
            <div class="card">
                <div class="card-body">
                    <!-- Controls Section -->
                    <div class="row mb-4 align-items-center">
                        <div class="col-md-8">
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <label class="form-label mb-1">ค้นหาผู้ใช้</label>
                                    <input type="text" class="form-control" id="searchInput" placeholder="ค้นหาชื่อ, ชื่อผู้ใช้, อีเมล...">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label mb-1">กรองตามสิทธิ์</label>
                                    <select class="form-select" id="roleFilter">
                                        <option value="">ทุกสิทธิ์</option>
                                        <option value="admin">ผู้ดูแลระบบ</option>
                                        <option value="user">ผู้ใช้ทั่วไป</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label mb-1">เรียงลำดับ</label>
                                    <select class="form-select" id="sortBy">
                                        <option value="created_at_desc">วันที่สมัครล่าสุด</option>
                                        <option value="created_at_asc">วันที่สมัครเก่าสุด</option>
                                        <option value="name_asc">ชื่อ A-Z</option>
                                        <option value="name_desc">ชื่อ Z-A</option>
                                        <option value="role_admin">ผู้ดูแลระบบก่อน</option>
                                        <option value="role_user">ผู้ใช้ทั่วไปก่อน</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <?php if ($this->session->userdata('role') === 'admin'): ?>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                <i class="fas fa-plus me-2"></i>เพิ่มผู้ใช้ใหม่
                            </button>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Users Table -->
                    <div class="table-responsive">
                        <table class="table" id="usersTable">
                            <thead>
                                <tr>
                                    <th>ผู้ใช้</th>
                                    <th>อีเมล</th>
                                    <th>สิทธิ์</th>
                                    <th>วันที่สมัคร</th>
                                    <th class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr data-user-id="<?= $user->id ?>" data-role="<?= $user->role ?>" data-name="<?= strtolower($user->full_name) ?>" data-created="<?= $user->created_at ?>">
                                    <td>
                                        <div class="user-info">
                                            <?php if ($user->profile_image): ?>
                                                <img src="<?= base_url('uploads/profiles/' . $user->profile_image) ?>" alt="Profile" class="avatar">
                                            <?php else: ?>
                                                <div class="avatar-placeholder">
                                                    <?= strtoupper(substr($user->full_name, 0, 1)) ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="user-details">
                                                <h6>
                                                    <?= htmlspecialchars($user->full_name) ?>
                                                    <?php if ($user->id == $this->session->userdata('user_id')): ?>
                                                        <span class="user-indicator">(คุณ)</span>
                                                    <?php endif; ?>
                                                </h6>
                                                <p>@<?= htmlspecialchars($user->username) ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= htmlspecialchars($user->email) ?></td>
                                    <td>
                                        <span class="badge <?= $user->role === 'admin' ? 'bg-success' : 'bg-primary' ?>">
                                            <?= $user->role === 'admin' ? 'ผู้ดูแลระบบ' : 'ผู้ใช้ทั่วไป' ?>
                                        </span>
                                    </td>
                                    <td><?= date('d/m/Y', strtotime($user->created_at)) ?></td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <!-- ปุ่มดู - ทุกคนดูได้ -->
                                            <button type="button" class="btn btn-outline-info" onclick="viewUser(<?= $user->id ?>)" title="ดูรายละเอียด">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            
                                            <?php if ($this->session->userdata('role') === 'admin'): ?>
                                                <!-- Admin แก้ไขได้ทุกคน -->
                                                <button type="button" class="btn btn-outline-primary" onclick="editUser(<?= $user->id ?>)" title="แก้ไข">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                
                                                <!-- Admin ลบได้ทุกคน ยกเว้นตัวเอง -->
                                                <?php if ($user->id != $this->session->userdata('user_id')): ?>
                                                    <button type="button" class="btn btn-outline-danger" onclick="deleteUser(<?= $user->id ?>, '<?= htmlspecialchars($user->full_name) ?>')" title="ลบ">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                <?php endif; ?>
                                                
                                            <?php elseif ($this->session->userdata('user_id') == $user->id): ?>
                                                <!-- User แก้ไขได้เฉพาะตัวเอง (ไม่มีปุ่มลบ) -->
                                                <button type="button" class="btn btn-outline-primary" onclick="editUser(<?= $user->id ?>)" title="แก้ไขข้อมูลของฉัน">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-user-plus me-2"></i>
                        เพิ่มผู้ใช้ใหม่
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="addUserForm">
                    <div class="modal-body">
                        <!-- ชื่อ-นามสกุล -->
                        <div class="mb-3">
                            <label class="form-label" for="add_full_name">
                                ชื่อ-นามสกุล <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" id="add_full_name" name="full_name" required placeholder="กรอกชื่อ-นามสกุล">
                            <div class="error-message" id="add_full_name-error"></div>
                        </div>

                        <!-- Username และ Email -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_username">
                                        ชื่อผู้ใช้ <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="add_username" name="username" required placeholder="กรอกชื่อผู้ใช้">
                                    <div class="error-message" id="add_username-error"></div>
                                    <div class="form-text">อย่างน้อย 3 ตัวอักษร</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_email">
                                        อีเมล <span class="required">*</span>
                                    </label>
                                    <input type="email" class="form-control" id="add_email" name="email" required placeholder="example@domain.com">
                                    <div class="error-message" id="add_email-error"></div>
                                </div>
                            </div>
                        </div>

                        <!-- รหัสผ่าน และ สิทธิ์ -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_password">
                                        รหัสผ่าน <span class="required">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="add_password" name="password" required placeholder="กรอกรหัสผ่าน">
                                        <button type="button" class="password-toggle" onclick="togglePassword('add_password')">
                                            <i class="fas fa-eye" id="add_password-icon"></i>
                                        </button>
                                    </div>
                                    <div class="error-message" id="add_password-error"></div>
                                    <div class="form-text">อย่างน้อย 6 ตัวอักษร</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_role">
                                        สิทธิ์ผู้ใช้ <span class="required">*</span>
                                    </label>
                                    <select class="form-select" id="add_role" name="role" required>
                                        <option value="">เลือกสิทธิ์</option>
                                        <option value="user">ผู้ใช้ทั่วไป</option>
                                        <option value="admin">ผู้ดูแลระบบ</option>
                                    </select>
                                    <div class="error-message" id="add_role-error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary" id="addUserBtn">
                            <span class="add-text">
                                <i class="fas fa-plus me-1"></i>เพิ่มผู้ใช้
                            </span>
                            <span class="loading">
                                <span class="spinner-border spinner-border-sm me-2"></span>
                                กำลังเพิ่ม...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View User Modal -->
    <div class="modal fade" id="viewUserModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-eye me-2"></i>
                        รายละเอียดผู้ใช้
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Profile Header -->
                    <div class="text-center mb-4 pb-4 border-bottom">
                        <div id="view_avatar" class="mx-auto mb-3"></div>
                        <h4 id="view_full_name" class="mb-2"></h4>
                        <p class="text-muted mb-2" id="view_username"></p>
                        <span id="view_role_badge"></span>
                    </div>

                    <!-- User Information Grid -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-label">
                                    <i class="fas fa-envelope me-2"></i>อีเมล
                                </div>
                                <div class="info-value" id="view_email"></div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-label">
                                    <i class="fas fa-user-tag me-2"></i>สิทธิ์ผู้ใช้
                                </div>
                                <div class="info-value" id="view_role"></div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-label">
                                    <i class="fas fa-calendar-plus me-2"></i>วันที่สมัครสมาชิก
                                </div>
                                <div class="info-value" id="view_created_at"></div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-label">
                                    <i class="fas fa-clock me-2"></i>อัพเดทล่าสุด
                                </div>
                                <div class="info-value" id="view_updated_at"></div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-label">
                                    <i class="fas fa-image me-2"></i>รูปโปรไฟล์
                                </div>
                                <div class="info-value" id="view_profile_status"></div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-label">
                                    <i class="fas fa-calendar-day me-2"></i>สมาชิกมาแล้ว
                                </div>
                                <div class="info-value" id="view_member_duration"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>ปิด
                    </button>
                    <button type="button" class="btn btn-primary" id="editFromView" onclick="editUserFromView()">
                        <i class="fas fa-edit me-1"></i>แก้ไข
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit me-2"></i>
                        แก้ไขข้อมูลผู้ใช้
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editUserForm">
                    <input type="hidden" id="edit_user_id" name="user_id">
                    <div class="modal-body">
                        <!-- ชื่อ-นามสกุล -->
                        <div class="mb-3">
                            <label class="form-label" for="edit_full_name">
                                ชื่อ-นามสกุล <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" id="edit_full_name" name="full_name" required>
                            <div class="error-message" id="edit_full_name-error"></div>
                        </div>

                        <!-- Username และ Email -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="edit_username">
                                        ชื่อผู้ใช้ <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="edit_username" name="username" required>
                                    <div class="error-message" id="edit_username-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="edit_email">
                                        อีเมล <span class="required">*</span>
                                    </label>
                                    <input type="email" class="form-control" id="edit_email" name="email" required>
                                    <div class="error-message" id="edit_email-error"></div>
                                </div>
                            </div>
                        </div>

                        <!-- รหัสผ่าน และ สิทธิ์ -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="edit_password">รหัสผ่านใหม่</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="edit_password" name="password" placeholder="เว้นว่างหากไม่เปลี่ยน">
                                        <button type="button" class="password-toggle" onclick="togglePassword('edit_password')">
                                            <i class="fas fa-eye" id="edit_password-icon"></i>
                                        </button>
                                    </div>
                                    <div class="error-message" id="edit_password-error"></div>
                                    <div class="form-text">เว้นว่างหากไม่ต้องการเปลี่ยน</div>
                                </div>
                            </div>
                            <div class="col-md-6" id="edit_role_section">
                                <div class="mb-3">
                                    <label class="form-label" for="edit_role">
                                        สิทธิ์ผู้ใช้ <span class="required">*</span>
                                    </label>
                                    <select class="form-select" id="edit_role" name="role" required>
                                        <option value="user">ผู้ใช้ทั่วไป</option>
                                        <option value="admin">ผู้ดูแลระบบ</option>
                                    </select>
                                    <div class="error-message" id="edit_role-error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary" id="editUserBtn">
                            <span class="edit-text">
                                <i class="fas fa-save me-1"></i>บันทึก
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

        function showConfirm(message, title = 'ยืนยันการดำเนินการ') {
            return Swal.fire({
                title: title,
                text: message,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            });
        }

        // Modal instances
        const addUserModal = new bootstrap.Modal(document.getElementById('addUserModal'));
        const viewUserModal = new bootstrap.Modal(document.getElementById('viewUserModal'));
        const editUserModal = new bootstrap.Modal(document.getElementById('editUserModal'));

        // Global variables
        let currentEditUserId = null;

        // Search and Filter Functions
        document.getElementById('searchInput').addEventListener('input', filterUsers);
        document.getElementById('roleFilter').addEventListener('change', filterUsers);
        document.getElementById('sortBy').addEventListener('change', sortUsers);

        function filterUsers() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const roleFilter = document.getElementById('roleFilter').value;
            const rows = document.querySelectorAll('#usersTable tbody tr');
            
            rows.forEach(row => {
                const name = row.querySelector('.user-details h6').textContent.toLowerCase();
                const username = row.querySelector('.user-details p').textContent.toLowerCase();
                const email = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const role = row.dataset.role;
                
                const matchesSearch = name.includes(searchTerm) || 
                                    username.includes(searchTerm) || 
                                    email.includes(searchTerm);
                const matchesRole = !roleFilter || role === roleFilter;
                
                row.style.display = matchesSearch && matchesRole ? '' : 'none';
            });
            
            updateStatistics();
        }

        function sortUsers() {
            const sortBy = document.getElementById('sortBy').value;
            const tbody = document.querySelector('#usersTable tbody');
            const rows = Array.from(tbody.querySelectorAll('tr'));
            
            rows.sort((a, b) => {
                switch(sortBy) {
                    case 'created_at_desc':
                        return new Date(b.dataset.created) - new Date(a.dataset.created);
                    case 'created_at_asc':
                        return new Date(a.dataset.created) - new Date(b.dataset.created);
                    case 'name_asc':
                        return a.dataset.name.localeCompare(b.dataset.name);
                    case 'name_desc':
                        return b.dataset.name.localeCompare(a.dataset.name);
                    case 'role_admin':
                        return a.dataset.role === 'admin' ? -1 : 1;
                    case 'role_user':
                        return a.dataset.role === 'user' ? -1 : 1;
                    default:
                        return 0;
                }
            });
            
            rows.forEach(row => tbody.appendChild(row));
        }

        function updateStatistics() {
            const visibleRows = document.querySelectorAll('#usersTable tbody tr[style=""], #usersTable tbody tr:not([style])');
            let totalUsers = 0, adminUsers = 0, regularUsers = 0;
            
            visibleRows.forEach(row => {
                totalUsers++;
                if (row.dataset.role === 'admin') {
                    adminUsers++;
                } else {
                    regularUsers++;
                }
            });
            
            document.getElementById('totalUsers').textContent = totalUsers;
            document.getElementById('adminUsers').textContent = adminUsers;
            document.getElementById('regularUsers').textContent = regularUsers;
        }

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

        // Form validation helper
        function showFieldError(fieldName, message) {
            const field = document.getElementById(fieldName);
            const errorElement = document.getElementById(fieldName + '-error');
            
            field.classList.add('is-invalid');
            errorElement.textContent = message;
            errorElement.style.display = 'block';
        }

        function clearErrors(formId) {
            const form = document.getElementById(formId);
            form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            form.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');
        }

        // User Functions
        function viewUser(userId) {
            fetch('<?= base_url("users/get_user") ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'user_id=' + userId
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const user = data.user;
                    
                    // Avatar
                    const avatarHtml = user.profile_image 
                        ? `<img src="<?= base_url('uploads/profiles/') ?>${user.profile_image}" alt="Profile" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #e9ecef;">`
                        : `<div style="width: 80px; height: 80px; border-radius: 50%; background: #f8f9fa; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 600; color: #6c757d; border: 3px solid #e9ecef;">${user.full_name.charAt(0).toUpperCase()}</div>`;
                    
                    document.getElementById('view_avatar').innerHTML = avatarHtml;
                    document.getElementById('view_full_name').textContent = user.full_name;
                    document.getElementById('view_username').textContent = '@' + user.username;
                    document.getElementById('view_email').textContent = user.email;
                    document.getElementById('view_role').textContent = user.role === 'admin' ? 'ผู้ดูแลระบบ' : 'ผู้ใช้ทั่วไป';
                    document.getElementById('view_created_at').textContent = new Date(user.created_at).toLocaleDateString('th-TH');
                    document.getElementById('view_updated_at').textContent = new Date(user.updated_at || user.created_at).toLocaleDateString('th-TH');
                    
                    const roleBadge = user.role === 'admin' 
                        ? '<span class="badge bg-success">ผู้ดูแลระบบ</span>'
                        : '<span class="badge bg-primary">ผู้ใช้ทั่วไป</span>';
                    document.getElementById('view_role_badge').innerHTML = roleBadge;
                    
                    // แสดง/ซ่อนปุ่มแก้ไข
                    const editBtn = document.getElementById('editFromView');
                    const currentUserId = <?= $this->session->userdata('user_id') ?>;
                    const currentUserRole = '<?= $this->session->userdata('role') ?>';
                    
                    if (currentUserRole === 'admin' || currentUserId == user.id) {
                        editBtn.style.display = 'inline-block';
                        currentEditUserId = user.id;
                    } else {
                        editBtn.style.display = 'none';
                    }
                    
                    viewUserModal.show();
                } else {
                    showError(data.message);
                }
            })
            .catch(error => {
                showError('ไม่สามารถโหลดข้อมูลผู้ใช้ได้');
            });
        }

        function editUser(userId) {
            fetch('<?= base_url("users/get_user") ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'user_id=' + userId
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const user = data.user;
                    
                    document.getElementById('edit_user_id').value = user.id;
                    document.getElementById('edit_full_name').value = user.full_name;
                    document.getElementById('edit_username').value = user.username;
                    document.getElementById('edit_email').value = user.email;
                    document.getElementById('edit_role').value = user.role;
                    document.getElementById('edit_password').value = '';
                    
                    // ซ่อนช่องสิทธิ์ถ้าไม่ใช่ admin
                    const currentUserRole = '<?= $this->session->userdata('role') ?>';
                    const roleSection = document.getElementById('edit_role_section');
                    if (currentUserRole !== 'admin') {
                        roleSection.style.display = 'none';
                    } else {
                        roleSection.style.display = 'block';
                    }
                    
                    clearErrors('editUserForm');
                    editUserModal.show();
                } else {
                    showError(data.message);
                }
            })
            .catch(error => {
                showError('ไม่สามารถโหลดข้อมูลผู้ใช้ได้');
            });
        }

        function editUserFromView() {
            viewUserModal.hide();
            if (currentEditUserId) {
                editUser(currentEditUserId);
            }
        }

        function deleteUser(userId, userName) {
            showConfirm(`คุณต้องการลบผู้ใช้ "${userName}" หรือไม่?`, 'ยืนยันการลบ').then((result) => {
                if (result.isConfirmed) {
                    fetch('<?= base_url("users/delete") ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'user_id=' + userId
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            showSuccess(data.message).then(() => {
                                location.reload();
                            });
                        } else {
                            showError(data.message);
                        }
                    })
                    .catch(error => {
                        showError('ไม่สามารถลบผู้ใช้ได้');
                    });
                }
            });
        }

        // Add User Form
        document.getElementById('addUserForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            clearErrors('addUserForm');
            
            const submitBtn = document.getElementById('addUserBtn');
            const addText = submitBtn.querySelector('.add-text');
            const loading = submitBtn.querySelector('.loading');
            
            addText.style.display = 'none';
            loading.style.display = 'inline-block';
            submitBtn.disabled = true;
            
            const formData = new FormData(this);
            
            fetch('<?= base_url("users/create") ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    showSuccess(data.message).then(() => {
                        addUserModal.hide();
                        location.reload();
                    });
                } else {
                    showError(data.message);
                }
            })
            .catch(error => {
                showError('ไม่สามารถเพิ่มผู้ใช้ได้');
            })
            .finally(() => {
                addText.style.display = 'inline-block';
                loading.style.display = 'none';
                submitBtn.disabled = false;
            });
        });

        // Edit User Form
        document.getElementById('editUserForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            clearErrors('editUserForm');
            
            const submitBtn = document.getElementById('editUserBtn');
            const editText = submitBtn.querySelector('.edit-text');
            const loading = submitBtn.querySelector('.loading');
            
            editText.style.display = 'none';
            loading.style.display = 'inline-block';
            submitBtn.disabled = true;
            
            const formData = new FormData(this);
            
            fetch('<?= base_url("users/update") ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    showSuccess(data.message).then(() => {
                        editUserModal.hide();
                        location.reload();
                    });
                } else {
                    showError(data.message);
                }
            })
            .catch(error => {
                showError('ไม่สามารถแก้ไขข้อมูลผู้ใช้ได้');
            })
            .finally(() => {
                editText.style.display = 'inline-block';
                loading.style.display = 'none';
                submitBtn.disabled = false;
            });
        });

        // Clear form when modal closes
        document.getElementById('addUserModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('addUserForm').reset();
            clearErrors('addUserForm');
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            filterUsers();
        });
    </script>
</body>
</html>
