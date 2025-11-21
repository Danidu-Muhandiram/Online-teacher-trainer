# TeachConnect - Online Teacher Trainer Platform

A comprehensive PHP-based web application designed for managing educator training programs, course enrollment, and educational content delivery.

## 🚀 Quick Start

1. **Clone the repository**
2. **Import the database**: `mysql -u root -p < online_teacher_trainer.sql`
3. **Start PHP server**: `php -S localhost:8000`
4. **Open browser**: `http://localhost:8000/home.php`

That's it! The application is ready to use with sample data included.

## 📸 Project Screenshots

<details>
<summary>🏠 Home Page & Main Interface</summary>

![Home Page](images/ss1.jpg)
*Landing page with course overview and navigation*

![Main Interface](images/ss2.jpg)
*User-friendly interface design*

</details>

<details>
<summary>👨‍🏫 Course Management</summary>

![Course Catalog](images/ss3.jpg)
*Course browsing and selection interface*

![Course Details](images/ss4.jpg)
*Detailed course information and enrollment*

</details>

<details>
<summary>👨‍💼 Admin & Trainer Dashboard</summary>

![Admin Dashboard](images/ss5.jpg)
*Administrative control panel*

![Trainer Features](images/ss6.jpg)
*Trainer management and course creation*

</details>

<details>
<summary>🎓 Student Features & More</summary>

![Student Dashboard](images/ss7.jpg)
*Student learning interface and progress tracking*

</details>

## 🚀 Overview

TeachConnect is a multi-role educational platform that connects administrators, trainers, and students in a unified learning ecosystem. The platform supports course management, blog publishing, feedback systems, and user authentication with role-based access control.

### Key Features
- **Multi-role Authentication**: Admin, Trainer, and Student dashboards
- **Course Management**: Create, update, delete, and enroll in courses
- **Blog System**: Content management for educational articles
- **Feedback & Rating System**: User feedback collection and management
- **Payment Integration**: Course enrollment payment processing
- **Contact Management**: User inquiry handling system

## 🏗️ Architecture

### Database Schema
**Database Name**: `online_teacher_trainer`

#### Core Tables:
- **`trainer`** / **`trainer2`**: Trainer profiles and credentials
- **`teacher`**: Student/teacher user accounts  
- **`admin`**: Administrator accounts
- **`courses`**: Course catalog and metadata
- **`blog_post`**: Blog articles and content
- **`feedback`**: User feedback and ratings
- **`contact_us`**: Contact form submissions

#### Table Relationships:
```
trainer (1) -> (*) courses (via trainer_id)
courses (1) -> (*) enrollments
blog_post (*) -> (1) admin/trainer (author)
feedback (*) -> (1) teacher/trainer (reviewer)
```

### File Structure
```
├── /                          # Root directory (entry points)
│   ├── home.php              # Landing page
│   ├── login.php             # Authentication
│   ├── register.php          # User registration
│   ├── dashboard.php         # User dashboard
│   ├── Course.php            # Course catalog
│   ├── Blog.php              # Blog listing
│   ├── Admin.php             # Admin panel
│   ├── payment.php           # Payment processing
│   ├── feedback.php          # Feedback system
│   ├── contact_us.php        # Contact form
│   └── FAQ.php               # FAQ page
│
├── /css/                     # Main stylesheets
├── /danidu_css/              # Custom CSS modules
├── /js/ & /danidu_js/        # JavaScript functionality
├── /images/ & /danidu_src/   # Media assets
├── /uploads/                 # User-uploaded content
├── /Trainer_New/             # Trainer-specific modules
│   ├── dashboard.php         # Trainer dashboard
│   ├── register.php          # Trainer registration
│   └── login.php             # Trainer authentication
│
├── /danidu_crud_php/         # CRUD operations
│   ├── insert.php            # Data insertion
│   ├── update.php            # Data updates
│   ├── delete.php            # Data deletion
│   └── display.php           # Data retrieval
│
└── /html/                    # Static HTML pages
```

## 🛠️ Technical Stack

### Backend
- **Language**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Session Management**: PHP Sessions
- **Password Hashing**: PHP `password_hash()` / `password_verify()`

### Frontend
- **HTML5** with responsive design
- **CSS3** with Flexbox/Grid layouts
- **JavaScript** (Vanilla)
- **Font Awesome** icons
- **Google Fonts** typography

### Dependencies
- **MySQLi Extension**: Database connectivity
- **GD Extension**: Image processing (for uploads)
- **Session Extension**: User authentication

## ⚙️ Installation & Setup

### Prerequisites
```powershell
# Check PHP installation
php --version

# Check MySQL service
Get-Service MySQL*

# Verify required PHP extensions
php -m | Select-String -Pattern "mysqli|gd|session"
```

### 1. Database Setup

The project includes a complete MySQL database file. Database connection is already configured in `config.php` and `conn.php`.

**Requirements:**
- MySQL Server 5.7+
- Database will be named: `online_teacher_trainer`
- Connection: `localhost`, user: `root`, password: (empty)

**Setup Steps:**
```powershell
# 1. Ensure MySQL is running
Get-Service MySQL*

# 2. Import the included database file
mysql -u root -p < online_teacher_trainer.sql

# 3. Verify import success
mysql -u root -p -e "USE online_teacher_trainer; SHOW TABLES;"
```

**Database includes:**
- Complete table structure (users, courses, blog posts, feedback, etc.)
- Sample data for immediate testing
- Pre-configured user accounts

**Note:** Database connection is pre-configured for standard local MySQL setup - no configuration changes needed.

### 2. Environment Configuration
```php
// config.php
<?php
$con = new mysqli("localhost", "root", "", "online_teacher_trainer");
if($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>

// conn.php  
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_teacher_trainer";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

### 3. Local Development
```powershell
# Navigate to project directory
Set-Location -LiteralPath 'C:\GITHUB PROJECTS\Y1S2-IWT Project'

# Import database (first time setup)
mysql -u root -p < online_teacher_trainer.sql

# Start PHP development server
php -S localhost:8000 -t .

# Open in browser
Start-Process "http://localhost:8000/home.php"
```

### 4. Production Deployment
```powershell
# Example Apache VirtualHost configuration
<VirtualHost *:80>
    DocumentRoot "C:\path\to\project"
    ServerName teachconnect.local
    
    <Directory "C:\path\to\project">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

## 🔐 Security Configuration

### Critical Security Actions Required:
1. **Remove credentials from repository**:
   ```powershell
   # Create .env file (already in .gitignore)
   New-Item -Path ".env" -ItemType File
   ```
   ```env
   DB_HOST=localhost
   DB_USERNAME=root
   DB_PASSWORD=your_secure_password
   DB_NAME=online_teacher_trainer
   ```

2. **Update database connection files**:
   ```php
   // Secure config.php
   <?php
   $con = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
   ?>
   ```

3. **SQL Injection Protection**: Most queries use prepared statements ✅
4. **Password Security**: Uses `password_hash()` ✅
5. **Session Security**: Implement HTTPS in production

## 🌐 API Endpoints & Routes

### Authentication
- `POST /login.php` - User authentication
- `POST /register.php` - User registration  
- `GET /logout.php` - Session termination

### User Management
- `GET /dashboard.php` - User dashboard
- `POST /update_profile.php` - Profile updates
- `POST /delete_account.php` - Account deletion

### Course Management
- `GET /Course.php` - Course catalog
- `POST /insertcourse.php` - Create course (trainer/admin)
- `POST /update.php` - Update course (trainer/admin)
- `POST /delete.php` - Delete course (trainer/admin)

### Content Management
- `GET /Blog.php` - Blog listing
- `POST /add-update-blog.php` - Blog CRUD operations
- `POST /delete_blog.php` - Blog deletion

### Feedback System
- `GET /feedback.php` - Feedback display
- `POST /create_feedback.php` - Submit feedback
- `GET /view_feedback.php` - Admin feedback management

### Payment & Enrollment
- `GET /payment.php` - Payment interface
- `POST /payment_successful.html` - Payment confirmation

## 🎯 User Roles & Permissions

### Admin (`admin` table)
- ✅ Full system access
- ✅ User management
- ✅ Course management
- ✅ Blog management
- ✅ Feedback moderation
- 📊 Dashboard: `Admin.php`

### Trainer (`trainer` / `trainer2` tables)
- ✅ Course creation/management
- ✅ Profile management
- ✅ Blog publishing (limited)
- 📊 Dashboard: `Trainer_New/dashboard.php`

### Student/Teacher (`teacher` table)
- ✅ Course enrollment
- ✅ Feedback submission
- ✅ Profile management
- 📊 Dashboard: `student_dashboard.html`

## 🧪 Testing

### Manual Testing Checklist
```powershell
# Test user registration
curl -X POST "http://localhost:8000/register.php" -d "fname=Test&lname=User&email=test@example.com&password=test123"

# Test course creation
# (Login as trainer first, then access course creation)

# Test feedback submission
curl -X POST "http://localhost:8000/create_feedback.php" -d "name=Test&email=test@example.com&feedback=Great platform&rating=5"
```

### Database Testing
```sql
-- Verify user creation
SELECT * FROM trainer WHERE email = 'test@example.com';

-- Check course enrollment
SELECT c.title, t.fname, t.lname FROM courses c 
JOIN trainer t ON c.trainer_id = t.trainer_id;

-- Review feedback
SELECT * FROM feedback ORDER BY created_at DESC;
```

## 📈 Performance Considerations

### Database Optimization
- Add indexes on frequently queried columns:
  ```sql
  ALTER TABLE trainer ADD INDEX idx_email (email);
  ALTER TABLE courses ADD INDEX idx_trainer (trainer_id);
  ALTER TABLE feedback ADD INDEX idx_created (created_at);
  ```

### File Structure Improvements
- **Consolidate asset folders**: Merge `css/` + `danidu_css/`, `js/` + `danidu_js/`
- **Implement autoloading**: For PHP classes and includes
- **Add caching**: For database queries and static content

## 🚀 Deployment Guide

### Production Checklist
- [ ] Environment variables configured
- [ ] Database credentials secured
- [ ] HTTPS enabled
- [ ] File permissions set correctly
- [ ] Error reporting disabled in production
- [ ] Backup strategy implemented
- [ ] Monitoring configured

### Docker Deployment (Optional)
```dockerfile
FROM php:8.0-apache
COPY . /var/www/html/
RUN docker-php-ext-install mysqli
EXPOSE 80
```

## 🤝 Contributing

### Development Workflow
1. **Create feature branch**: `git checkout -b feature/new-feature`
2. **Follow coding standards**: PSR-12 for PHP
3. **Test thoroughly**: Manual testing + database verification
4. **Update documentation**: README and inline comments
5. **Submit PR**: Target `Danidu-New` branch

### Code Standards
- Use prepared statements for all database queries
- Validate and sanitize all user inputs
- Follow consistent naming conventions
- Add proper error handling and logging

## 📄 License
This project currently has no license. Consider adding MIT or Apache 2.0 for open-source distribution.

## 📞 Support
- **Contact Form**: Built into the application (`contact_us.php`)
- **FAQ**: Available at `/FAQ.php`
- **Issues**: Use GitHub Issues for bug reports

---

**⚠️ Security Notice**: This application contains hardcoded database credentials. Ensure proper environment configuration before production deployment.