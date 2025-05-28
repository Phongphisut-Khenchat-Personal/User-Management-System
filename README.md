# 👥 User Management System

![GitHub stars](https://img.shields.io/github/stars/your-username/user-management-system?style=social)
![GitHub forks](https://img.shields.io/github/forks/your-username/user-management-system?style=social)
![GitHub issues](https://img.shields.io/github/issues/your-username/user-management-system)
![GitHub license](https://img.shields.io/github/license/your-username/user-management-system)

![Screenshot (1)](https://github.com/user-attachments/assets/76698441-1be5-4086-8554-30ab1c748b01)
![Screenshot (2)](https://github.com/user-attachments/assets/35e6f2cc-33e1-4957-bc91-9ce52bda8522)
![Screenshot (4)](https://github.com/user-attachments/assets/c204edfe-997e-495b-bfbb-4ad2e2be2f6c)
![Screenshot (3)](https://github.com/user-attachments/assets/1a1dbf5e-38fa-468c-8317-470654cf2bbc)

A modern, responsive user management system built with CodeIgniter 3 and Bootstrap 5.

## 🚀 Live Demo

🔗 **[View Live Demo](https://your-demo-url.com)** (ถ้ามี)

**Quick Test:**
- **Admin:** `admin` / `123456`
- **User:** `user` / `123456`

## ✨ Features

### 🔐 Authentication
- **Login/Register** - Secure user authentication with bcrypt hashing
- **Role-based Access** - Admin and User roles with different permissions
- **Profile Upload** - Upload profile images during registration
- **Session Management** - Secure session handling with timeout
- **Form Validation** - Real-time client-side and server-side validation

### 👤 Profile Management
- **View/Edit Profile** - Comprehensive user profile management
- **Image Upload** - Profile picture upload with validation (5MB max)
- **Real-time Updates** - Live form validation and instant updates
- **Responsive Design** - Optimized for desktop, tablet, and mobile
- **Avatar Generation** - Auto-generated initials when no image uploaded

### 📊 Dashboard & Analytics
- **User Statistics** - Real-time counts: total users, admins, regular users
- **User Management** - View, edit, delete users (Admin only)
- **Search & Filter** - Advanced filtering by name, email, role
- **Sorting Options** - Sort by registration date, name, role
- **Detailed User Views** - Modal windows with complete user information

### 🎨 Modern UI/UX
- **Minimal Design** - Clean, modern interface following current trends
- **Bootstrap 5** - Responsive grid system with custom components
- **SweetAlert2** - Beautiful, customizable notifications and alerts
- **Font Awesome 6** - Comprehensive icon library
- **Mobile-First** - Fully responsive design for all screen sizes
- **Dark Mode Ready** - Prepared for dark theme implementation

## 🛠️ Tech Stack

| Category | Technologies |
|----------|-------------|
| **Backend** | CodeIgniter 3, PHP 7.4+, MySQL 5.7+ |
| **Frontend** | Bootstrap 5, JavaScript ES6, HTML5, CSS3 |
| **UI Libraries** | SweetAlert2, Font Awesome 6, Google Fonts |
| **Database** | MySQL with optimized queries and indexing |
| **File Handling** | Secure image upload with validation |
| **Security** | bcrypt, CSRF protection, XSS prevention |

## 📦 Quick Installation

### 🐳 Docker Setup (Recommended)
```bash
# Clone and run with Docker
git clone https://github.com/your-username/user-management-system.git
cd user-management-system
docker-compose up -d
```

### 💻 Manual Setup

#### Prerequisites
- PHP 7.4+ with extensions: `mysqli`, `gd`, `fileinfo`
- MySQL 5.7+ or MariaDB 10.3+
- Web server (Apache/Nginx) with mod_rewrite
- Composer (optional but recommended)

#### Installation Steps

1. **Clone Repository**
   ```bash
   git clone https://github.com/your-username/user-management-system.git
   cd user-management-system
   ```

2. **Database Setup**
   ```sql
   -- Create database
   CREATE DATABASE user_management CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   
   -- Create users table with indexes
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) UNIQUE NOT NULL,
       email VARCHAR(100) UNIQUE NOT NULL,
       password VARCHAR(255) NOT NULL,
       full_name VARCHAR(100) NOT NULL,
       role ENUM('admin', 'user') DEFAULT 'user',
       profile_image VARCHAR(255) NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
       
       INDEX idx_username (username),
       INDEX idx_email (email),
       INDEX idx_role (role),
       INDEX idx_created_at (created_at)
   ) ENGINE=InnoDB;
   
   -- Insert sample data
   INSERT INTO users (username, email, password, full_name, role) VALUES
   ('admin', 'admin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'System Administrator', 'admin'),
   ('user', 'user@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Regular User', 'user');
   ```

3. **Configuration**
   ```bash
   # Copy configuration file
   cp application/config/database.php.example application/config/database.php
   cp application/config/config.php.example application/config/config.php
   
   # Edit database settings
   nano application/config/database.php
   
   # Set base URL
   nano application/config/config.php
   ```

4. **Set Permissions**
   ```bash
   # Create upload directories
   mkdir -p uploads/profiles
   
   # Set proper permissions
   chmod 755 uploads uploads/profiles
   chown -R www-data:www-data uploads/
   
   # For development
   chmod 777 uploads uploads/profiles
   ```

5. **Web Server Configuration**
   
   **Apache (.htaccess)**
   ```apache
   RewriteEngine On
   RewriteCond %{REQUEST_FILENAME} !-f
   RewriteCond %{REQUEST_FILENAME} !-d
   RewriteRule ^(.*)$ index.php/$1 [L]
   ```
   
   **Nginx**
   ```nginx
   location / {
       try_files $uri $uri/ /index.php?$query_string;
   }
   ```

## 🎯 Demo Credentials

| Role | Username | Password | Capabilities |
|------|----------|----------|-------------|
| **Admin** | `admin` | `123456` | Full system access, user management |
| **User** | `user` | `123456` | Profile management, view others |

## 📁 Project Structure

```
user-management-system/
├── 📁 application/
│   ├── 📁 controllers/          # MVC Controllers
│   │   ├── 📄 Auth.php          # Authentication logic
│   │   ├── 📄 Dashboard.php     # Main dashboard
│   │   ├── 📄 Profile.php       # Profile management
│   │   └── 📄 Users.php         # User CRUD operations
│   ├── 📁 models/               # Data Models
│   │   └── 📄 User_model.php    # User database operations
│   ├── 📁 views/                # Frontend Views
│   │   ├── 📁 auth/             # Authentication pages
│   │   ├── 📁 dashboard/        # Dashboard interface
│   │   └── 📁 profile/          # Profile pages
│   ├── 📁 config/               # Configuration files
│   └── 📁 helpers/              # Custom helpers
├── 📁 uploads/                  # File uploads
│   └── 📁 profiles/             # Profile images
├── 📁 assets/                   # Static resources
├── 📄 .htaccess                 # Apache rewrite rules
├── 📄 docker-compose.yml        # Docker configuration
└── 📄 README.md                 # Project documentation
```

## ⚙️ Configuration Options

### Security Settings
```php
// application/config/config.php
$config['encryption_key'] = 'your-secret-key-here';
$config['sess_expire_on_close'] = TRUE;
$config['sess_use_database'] = FALSE;
```

### File Upload Configuration
```php
// Max file size: 5MB
// Allowed types: JPG, JPEG, PNG, GIF, WEBP
// Storage path: uploads/profiles/
// Auto-resize: 500x500px max
```

### Database Optimization
- Indexed columns for fast queries
- UTF8MB4 character set for emoji support
- InnoDB engine for ACID compliance
- Connection pooling enabled

## 🚀 Usage Guide

### 👨‍💼 For Administrators
1. **User Management**: Add, edit, delete users
2. **Analytics**: View user statistics and growth
3. **Permissions**: Manage role assignments
4. **System Monitoring**: Track user activities

### 👤 For Regular Users
1. **Profile Setup**: Complete profile with photo
2. **Account Management**: Update personal information
3. **Privacy**: Control profile visibility
4. **Security**: Change passwords regularly

## 🧪 Testing

```bash
# Run PHP built-in server for testing
php -S localhost:8000

# Access application
open http://localhost:8000
```

## 🔧 Development

### Adding New Features
1. Create feature branch: `git checkout -b feature/new-feature`
2. Follow MVC pattern in CodeIgniter
3. Add appropriate validation and security checks
4. Test thoroughly before committing
5. Submit pull request with detailed description

### Code Standards
- Follow PSR-12 coding standards
- Comment complex logic
- Use meaningful variable names
- Implement proper error handling

## 🐛 Troubleshooting

### Common Issues

**Upload Permission Error**
```bash
chmod 755 uploads/profiles
chown www-data:www-data uploads/
```

**Database Connection Failed**
- Check database credentials in `application/config/database.php`
- Ensure MySQL service is running
- Verify database exists and user has permissions

**Session Issues**
- Check session configuration in `application/config/config.php`
- Ensure session directory is writable
- Clear browser cookies and try again

## 🤝 Contributing

We welcome contributions! Please see our [Contributing Guide](CONTRIBUTING.md) for details.

### Development Workflow
1. Fork the repository
2. Create feature branch (`git checkout -b feature/amazing-feature`)
3. Make changes and test thoroughly
4. Commit with descriptive messages (`git commit -m 'feat: Add amazing feature'`)
5. Push to branch (`git push origin feature/amazing-feature`)
6. Open Pull Request with detailed description

## 📄 Changelog

See [CHANGELOG.md](CHANGELOG.md) for version history and updates.

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Authors & Contributors

**Primary Developer**
- **Your Name** - [@your-username](https://github.com/your-username)
- Email: your.email@example.com
- LinkedIn: [Your LinkedIn](https://linkedin.com/in/your-profile)

**Contributors**
- See [CONTRIBUTORS.md](CONTRIBUTORS.md) for full list

## 🙏 Acknowledgments

- [CodeIgniter](https://codeigniter.com/) - The PHP framework
- [Bootstrap](https://getbootstrap.com/) - CSS framework
- [Font Awesome](https://fontawesome.com/) - Icon library
- [SweetAlert2](https://sweetalert2.github.io/) - Beautiful alerts
- [Google Fonts](https://fonts.google.com/) - Typography
- All beta testers and contributors

## 📊 Project Stats

![GitHub repo size](https://img.shields.io/github/repo-size/your-username/user-management-system)
![GitHub code size](https://img.shields.io/github/languages/code-size/your-username/user-management-system)
![GitHub top language](https://img.shields.io/github/languages/top/your-username/user-management-system)
![GitHub last commit](https://img.shields.io/github/last-commit/your-username/user-management-system)

---

⭐ **If you found this project helpful, please give it a star!**

📧 **Questions?** Feel free to [open an issue](https://github.com/your-username/user-management-system/issues) or contact us directly.
