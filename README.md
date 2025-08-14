# Student Registration System

A comprehensive web-based student registration system built with PHP and MySQL for G.PULLAIAH COLLEGE OF ENGINEERING AND TECHNOLOGY. This system allows students to register their academic details and provides an admin interface for managing student records.

## 🎯 Features

### Student Registration
- **User-friendly registration form** with modern UI design
- **Comprehensive data collection** including personal, academic, and certification details
- **Real-time form validation** for data integrity
- **Responsive design** that works on all devices

### Admin Panel
- **Secure login system** with session management
- **Dashboard overview** of all registered students
- **CRUD operations** (Create, Read, Update, Delete)
- **Visual indicators** for certification status
- **Search and filter** capabilities through the dashboard

### Data Management
- **MySQL database** for reliable data storage
- **Data validation** and sanitization
- **Error handling** with user-friendly messages
- **Backup-friendly** database structure

## 🛠️ Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP 7.0+
- **Database**: MySQL 5.7+
- **Server**: Apache/Nginx (XAMPP/WAMP compatible)

## 📁 Project Structure

```
RegistrationForm/
├── index.html              # Student registration form
├── insert.php              # Registration processing
├── README.md               # Project documentation
├── admin/                  # Admin panel files
│   ├── login.php          # Admin authentication
│   ├── dashboard.php      # Admin dashboard
│   ├── edit.php           # Edit student records
│   └── logout.php         # Admin logout
```

## 🚀 Installation & Setup

### Prerequisites
- XAMPP/WAMP/MAMP installed
- PHP 7.0 or higher
- MySQL 5.7 or higher
- Web browser (Chrome, Firefox, Safari, Edge)

### Step-by-Step Setup

1. **Clone/Download** the project to your local machine

2. **Place files** in your web server directory:
   - For XAMPP: `C:/xampp/htdocs/RegistrationForm/`
   - For WAMP: `C:/wamp/www/RegistrationForm/`

3. **Create Database**:
   ```sql
   CREATE DATABASE basic2;
   USE basic2;
   
   CREATE TABLE details (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       rollno VARCHAR(20) NOT NULL UNIQUE,
       email VARCHAR(100) NOT NULL,
       phone VARCHAR(15) NOT NULL,
       branch VARCHAR(10) NOT NULL,
       percentage DECIMAL(4,2) NOT NULL,
       smart_interviews ENUM('yes','no') NOT NULL,
       global_cert ENUM('yes','no') NOT NULL,
       cambridge_cert ENUM('yes','no') NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

4. **Configure Database Connection**:
   - All PHP files use default XAMPP credentials:
   - Host: `localhost`
   - Username: `root`
   - Password: `""` (empty)
   - Database: `basic2`

5. **Access the Application**:
   - Student Registration: `http://localhost/RegistrationForm/`
   - Admin Panel: `http://localhost/RegistrationForm/admin/login.php`

## 🔐 Default Admin Credentials

- **Username**: `admin`
- **Password**: `admin123`

⚠️ **Security Note**: Change these credentials in production by modifying `admin/login.php`

## 📊 Database Schema

### Table: `details`
| Column | Type | Description |
|--------|------|-------------|
| `id` | INT | Primary key, auto-increment |
| `name` | VARCHAR(100) | Student's full name |
| `rollno` | VARCHAR(20) | Unique roll number |
| `email` | VARCHAR(100) | Student email address |
| `phone` | VARCHAR(15) | Contact number |
| `branch` | VARCHAR(10) | Academic branch (CAI/DS/IOT) |
| `percentage` | DECIMAL(4,2) | Current CGPA |
| `smart_interviews` | ENUM | Smart interviews completion |
| `global_cert` | ENUM | Global certification status |
| `cambridge_cert` | ENUM | Cambridge certification status |
| `created_at` | TIMESTAMP | Record creation timestamp |

## 🎨 User Interface

### Registration Form
- **Modern gradient background** with teal color scheme
- **Responsive form layout** with proper spacing
- **Input validation** with required fields
- **Dropdown menus** for branch selection
- **Radio buttons** for yes/no questions

### Admin Dashboard
- **Clean table layout** with alternating row colors
- **Color-coded status indicators** (green for yes, red for no)
- **Action buttons** for edit/delete operations
- **Hover effects** for better user experience
- **Responsive design** for mobile viewing

## 🔧 Customization Options

### Changing Colors
Modify the CSS in each file to change the color scheme:
```css
--primary-color: #00796b;
--secondary-color: #004d40;
--accent-color: #80deea;
```

### Adding New Fields
1. Add the field to the `details` table
2. Update the registration form in `index.html`
3. Modify `insert.php` to handle the new field
4. Update admin dashboard and edit forms

### Changing Branches
Edit the dropdown options in `index.html`:
```html
<option>New Branch 1</option>
<option>New Branch 2</option>
```

## 🛡️ Security Features

- **SQL injection prevention** through proper query construction
- **Session management** for admin authentication
- **Input sanitization** for all user inputs
- **CSRF protection** through session tokens
- **Password protection** for admin panel access

## 📱 Browser Compatibility

- ✅ Chrome 80+
- ✅ Firefox 75+
- ✅ Safari 13+
- ✅ Edge 80+
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

## 🐛 Troubleshooting

### Common Issues

1. **Database Connection Error**:
   - Check MySQL service is running
   - Verify database credentials in PHP files
   - Ensure database `basic2` exists

2. **Registration Not Working**:
   - Check file permissions (755 for folders, 644 for files)
   - Verify MySQL user has INSERT permissions
   - Check PHP error logs

3. **Admin Login Issues**:
   - Clear browser cookies and cache
   - Check session.save_path in php.ini
   - Verify credentials in `admin/login.php`

### Error Logs
- PHP errors: Check `php_error.log` in your server logs
- MySQL errors: Check MySQL error log
- Browser errors: Use browser developer tools (F12)

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

## 👥 Support

For support, email: support@gpcet.edu.in or create an issue in the project repository.

## 🔄 Future Enhancements

- [ ] Export data to Excel/PDF
- [ ] Advanced search and filtering
- [ ] Bulk operations (delete multiple records)
- [ ] Email notifications for new registrations
- [ ] Photo upload functionality
- [ ] Multi-level admin access
- [ ] Database backup utility
- [ ] Analytics dashboard with charts
- [ ] Mobile app integration
- [ ] QR code generation for student IDs

---

**Developed with ❤️ for G.PULLAIAH COLLEGE OF ENGINEERING AND TECHNOLOGY**
