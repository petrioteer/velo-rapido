# 🚲 Velo Rapido - Premium Bike Rental System 🚲

Velo Rapido is a comprehensive bike rental management system that allows users to browse, book, and rent bikes online. The platform offers a seamless experience for both users and administrators, with features like bike management, user management, reservation tracking, and maintenance scheduling.

## 📑 Table of Contents

1. [✨ Features](#features)
2. [🏗️ Project Structure](#project-structure)
3. [💻 Technologies Used](#technologies-used)
4. [🗄️ Database Structure](#database-structure)
5. [👥 User Roles](#user-roles)
6. [🔧 Installation](#installation)
7. [🚀 Deployment](#deployment)
8. [🔑 Admin Credentials](#admin-credentials)
9. [🤝 Contributing](#contributing)
10. [📝 License](#license)

## ✨ Features

### For Users 🧑‍🚲

- **Browse Bike Fleet**: Users can view all available bikes with detailed specifications and photos
- **User Registration/Login**: Secure authentication system for users to create and manage accounts
- **Bike Reservation**: Simple booking process with date and time selection
- **Online Payment**: Multiple payment options including card, COD, and UPI
- **Rental Dashboard**: Track current and past rentals
- **Damage Reporting**: Submit reports for any damages during rental period
- **Dark/Light Mode**: User interface with theme support 🌓

### For Administrators 👨‍💼

- **Comprehensive Dashboard**: Overview of rentals, bikes, users, and maintenance
- **Bike Management**: Add, edit, delete, and manage bike inventory
- **User Management**: Manage user accounts and permissions
- **Reservation Tracking**: Monitor all bookings and rental status
- **Maintenance Scheduling**: Schedule and track bike maintenance 🔧
- **Damage Report Management**: Review and process damage reports

## 🏗️ Project Structure

```
velo-rapido/
├── index.php                 # Homepage
├── admin/                    # Admin panel 👨‍💼
│   ├── dashboard.php         # Admin dashboard
│   ├── bikes/                # Bike management
│   ├── maintenance/          # Maintenance management
│   ├── reports/              # Damage and reservation reports
│   └── users/                # User management
├── assets/                   # Static assets
│   ├── css/                  # Stylesheets 🎨
│   └── images/               # Images including bike photos and favicon
├── auth/                     # Authentication 🔐
│   ├── login.php             # Login page
│   ├── logout.php            # Logout functionality
│   └── register.php          # Registration page
├── db/                       # Database 🗄️
│   ├── db.php                # Database connection and helpers
│   └── velo_rapido.sql       # SQL schema and initial data
├── includes/                 # Shared components
│   ├── footer.php            # Footer component
│   ├── header.php            # Header component with navigation
│   └── utils.php             # Utility functions 🛠️
└── pages/                    # User-facing pages
    ├── book.php              # Booking page
    ├── dashboard.php         # User dashboard
    ├── fleet.php             # Bike catalog 🚲
    ├── payment.php           # Payment processing 💳
    └── report-damage.php     # Damage reporting form
```

## 💻 Technologies Used

- **Frontend**:
  - HTML5/CSS3 🎨
  - Tailwind CSS for styling ✨
  - JavaScript 📜
  - Font Awesome for icons 🔣
  
- **Backend**:
  - PHP 7.4+ 🐘
  - MySQL Database 🗄️
  
- **Deployment**:
  - InfinityFree for web hosting ☁️
  - FreeSQLDatabase for database hosting 🏦

## 🗄️ Database Structure

The database consists of the following tables:

1. **users** 👤: Stores user information and authentication details
   - Fields: user_id, first_name, last_name, email, password, role, phone, address, created_at, updated_at, status

2. **bikes** 🚲: Contains information about all bikes available for rental
   - Fields: bike_id, bike_name, bike_type, specifications, image_path, hourly_rate, status, created_at, updated_at

3. **reservations** 📅: Tracks all bike reservations
   - Fields: reservation_id, user_id, bike_id, start_time, end_time, pickup_location, dropoff_location, status, created_at, updated_at

4. **payments** 💰: Records payment information for each reservation
   - Fields: payment_id, reservation_id, amount, payment_method, payment_status, transaction_id, created_at, updated_at

5. **damages** ⚠️: Tracks damage reports submitted by users
   - Fields: damage_id, bike_id, user_id, description, image_path, status, reported_at, updated_at

6. **maintenance** 🔧: Manages bike maintenance schedules
   - Fields: maintenance_id, bike_id, description, maintenance_type, start_date, end_date, completion_date, status, created_at, updated_at

## 👥 User Roles

The system has two primary user roles:

1. **Regular Users** 🧑‍🚲:
   - Browse and book bikes
   - Manage their reservations
   - Report damages
   - View rental history

2. **Administrators** 👨‍💼:
   - All regular user privileges
   - Manage bike inventory
   - Process reservations
   - Schedule maintenance
   - Handle damage reports
   - Manage user accounts

## 🔧 Installation

1. Clone the repository to your local machine or server 📥
2. Create a MySQL database and import the `db/velo_rapido.sql` file 🗄️
3. Configure your database connection in `db/db.php` ⚙️
4. Ensure your web server has PHP 7.4+ installed 🐘
5. Navigate to the project URL in your browser 🌐

## 🚀 Deployment

The Velo Rapido project is currently deployed at:

- **Website**: [http://velo-rapido.wuaze.com/](http://velo-rapido.wuaze.com/) 🌐
- **Host**: InfinityFree ☁️
- **Database**: FreeSQLDatabase 🏦

## 🔑 Admin Credentials

To access the admin panel, use the following credentials:

- **Email**: <admin@velorapido.com> 📧
- **Password**: admin123 🔒

## 🤝 Contributing

Contributions to Velo Rapido are welcome! To contribute:

1. Fork the repository 🍴
2. Create a feature branch (`git checkout -b feature/AmazingFeature`) 🌿
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`) ✅
4. Push to the branch (`git push origin feature/AmazingFeature`) 📤
5. Open a Pull Request 🔍

## 📝 License

This project is licensed under the MIT License - see the LICENSE file for details.

---

Made with ❤️ by petrioteer
