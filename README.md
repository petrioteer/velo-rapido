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

The database consists of six main tables with the following structure:

### 👤 Users Table

```
┌─────────────┬─────────────────┬─────────────────────────────────┐
│ Column      │ Type            │ Description                     │
├─────────────┼─────────────────┼─────────────────────────────────┤
│ user_id     │ INT (PK)        │ Unique identifier               │
│ first_name  │ VARCHAR(50)     │ User's first name               │
│ last_name   │ VARCHAR(50)     │ User's last name                │
│ email       │ VARCHAR(100)    │ User's email (unique)           │
│ password    │ VARCHAR(255)    │ Hashed password                 │
│ role        │ ENUM            │ 'user' or 'admin'               │
│ phone       │ VARCHAR(20)     │ Contact number                  │
│ address     │ TEXT            │ User's address                  │
│ created_at  │ TIMESTAMP       │ Account creation time           │
│ updated_at  │ DATETIME        │ Last update time                │
│ status      │ ENUM            │ 'active' or 'disabled'          │
└─────────────┴─────────────────┴─────────────────────────────────┘
```

### 🚲 Bikes Table

```
┌──────────────┬─────────────────┬─────────────────────────────────┐
│ Column       │ Type            │ Description                     │
├──────────────┼─────────────────┼─────────────────────────────────┤
│ bike_id      │ INT (PK)        │ Unique identifier               │
│ bike_name    │ VARCHAR(100)    │ Name of the bike                │
│ bike_type    │ VARCHAR(50)     │ Type (MTB, City, etc.)          │
│ specifications│ TEXT           │ Detailed specifications         │
│ image_path   │ VARCHAR(255)    │ Path to bike image              │
│ hourly_rate  │ DECIMAL(10,2)   │ Cost per hour                   │
│ status       │ ENUM            │ 'available', 'reserved', etc.   │
│ created_at   │ TIMESTAMP       │ When bike was added             │
│ updated_at   │ DATETIME        │ Last update time                │
└──────────────┴─────────────────┴─────────────────────────────────┘
```

### 📅 Reservations Table

```
┌─────────────────┬─────────────────┬─────────────────────────────────┐
│ Column          │ Type            │ Description                     │
├─────────────────┼─────────────────┼─────────────────────────────────┤
│ reservation_id  │ INT (PK)        │ Unique identifier               │
│ user_id         │ INT (FK)        │ Reference to users table        │
│ bike_id         │ INT (FK)        │ Reference to bikes table        │
│ start_time      │ DATETIME        │ Rental start time               │
│ end_time        │ DATETIME        │ Rental end time                 │
│ pickup_location │ VARCHAR(255)    │ Where to pick up the bike       │
│ dropoff_location│ VARCHAR(255)    │ Where to return the bike        │
│ status          │ ENUM            │ 'pending', 'confirmed', etc.    │
│ created_at      │ TIMESTAMP       │ When reservation was made       │
│ updated_at      │ DATETIME        │ Last update time                │
└─────────────────┴─────────────────┴─────────────────────────────────┘
```

### 💰 Payments Table

```
┌──────────────┬─────────────────┬─────────────────────────────────┐
│ Column       │ Type            │ Description                     │
├──────────────┼─────────────────┼─────────────────────────────────┤
│ payment_id   │ INT (PK)        │ Unique identifier               │
│ reservation_id│ INT (FK)       │ Reference to reservations table │
│ amount       │ DECIMAL(10,2)   │ Payment amount                  │
│ payment_method│ ENUM           │ 'card', 'cod', 'upi'            │
│ payment_status│ ENUM           │ 'pending', 'completed', etc.    │
│ transaction_id│ VARCHAR(255)   │ External transaction reference  │
│ created_at   │ TIMESTAMP       │ When payment was made           │
│ updated_at   │ DATETIME        │ Last update time                │
└──────────────┴─────────────────┴─────────────────────────────────┘
```

### ⚠️ Damages Table

```
┌────────────┬─────────────────┬─────────────────────────────────┐
│ Column     │ Type            │ Description                     │
├────────────┼─────────────────┼─────────────────────────────────┤
│ damage_id  │ INT (PK)        │ Unique identifier               │
│ bike_id    │ INT (FK)        │ Reference to bikes table        │
│ user_id    │ INT (FK)        │ Reference to users table        │
│ description│ TEXT            │ Details of the damage           │
│ image_path │ VARCHAR(255)    │ Path to damage photos           │
│ status     │ ENUM            │ 'reported', 'resolved', etc.    │
│ reported_at│ TIMESTAMP       │ When damage was reported        │
│ updated_at │ DATETIME        │ Last update time                │
└────────────┴─────────────────┴─────────────────────────────────┘
```

### 🔧 Maintenance Table

```
┌────────────────┬─────────────────┬─────────────────────────────────┐
│ Column         │ Type            │ Description                     │
├────────────────┼─────────────────┼─────────────────────────────────┤
│ maintenance_id │ INT (PK)        │ Unique identifier               │
│ bike_id        │ INT (FK)        │ Reference to bikes table        │
│ description    │ TEXT            │ Maintenance details             │
│ maintenance_type│ VARCHAR(50)    │ Type of maintenance             │
│ start_date     │ DATE            │ When maintenance begins         │
│ end_date       │ DATE            │ Expected completion date        │
│ completion_date│ DATE            │ Actual completion date          │
│ status         │ ENUM            │ 'scheduled', 'in_progress', etc.│
│ created_at     │ TIMESTAMP       │ When record was created         │
│ updated_at     │ DATETIME        │ Last update time                │
└────────────────┴─────────────────┴─────────────────────────────────┘
```

### Relationships Diagram

```
┌─────────┐     ┌──────────────┐     ┌─────────┐
│  Users  │──┐  │ Reservations │  ┌──│  Bikes  │
└─────────┘  └─>│              │<─┘  └─────────┘
     │          └──────────────┘          │
     │                  │                 │
     │                  v                 │
     │          ┌──────────────┐          │
     │          │   Payments   │          │
     │          └──────────────┘          │
     │                                    │
     │                                    │
     └───────┐                 ┌──────────┘
             v                 v
       ┌──────────┐     ┌────────────┐
       │ Damages  │     │ Maintenance│
       └──────────┘     └────────────┘
```

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

- **Website**: [https://velo-rapido.wuaze.com/](https://velo-rapido.wuaze.com/) 🔒🌐
- **Host**: InfinityFree ☁️
- **Database**: FreeSQLDatabase 🏦
- **Security**: SSL-secured with HTTPS protocol for data protection

## 🔑 Admin Credentials

To access the admin panel, use the following credentials:

- **Email**: <admin@velorapido.com>
- **Password**: admin123

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
