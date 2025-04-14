
# Copilot Instructions for Velo Rapido 🚴‍♂️

These instructions are intended to help GitHub Copilot or any developer onboard quickly and follow best practices while working on the Velo Rapido project.

---

## 📦 Project Structure (PHP + Tailwind + MySQL)

```plaintext
velo-rapido/
├── index.php                // Homepage
├── auth/
│   ├── login.php
│   ├── register.php
│   └── logout.php
├── pages/
│   ├── book.php             // Booking form with Leaflet map
│   ├── dashboard.php        // User dashboard for bookings
│   ├── fleet.php            // Show available bikes
│   ├── payment.php
│   └── report-damage.php
├── admin/
│   ├── dashboard.php
│   ├── fleet.php
│   └── maintenance.php
├── assets/
│   ├── css/
│   │   └── tailwind.css
│   ├── js/
│   │   └── map.js           // Leaflet map interactions
│   └── images/
├── db/
│   └── db.php               // Database connection
└── velo_rapido.sql          // Database schema
```

---

## ✅ Technologies Used

- **Frontend**: HTML, Tailwind CSS, JavaScript
- **Backend**: PHP
- **Map Integration**: Leaflet.js (for pickup/dropoff on booking page)
- **Database**: MySQL (via XAMPP)

---

## 📋 Best Practices

1. **Minimal Code Only**
   - Avoid unnecessary libraries or frameworks.
   - No bloated frontend packages. Keep it HTML + Tailwind + Vanilla JS.

2. **Organized Files**
   - One feature per file (e.g., `book.php`, `payment.php`, etc.)
   - Admin and user roles clearly separated in `admin/` and `pages/`

3. **Security First**
   - Escape all user inputs.
   - Use prepared statements in all SQL queries.
   - Do not expose DB credentials—keep them in `db/db.php`.

4. **Frontend UX**
   - All pages must be **responsive** using Tailwind’s utility classes.
   - Use standard breakpoints for mobile and desktop.
   - Forms must validate inputs on both frontend and backend.

5. **Interactive Maps with Leaflet**
   - `book.php` uses Leaflet.js
   - Marker selections should update hidden form fields (pickup/dropoff coordinates).
   - Fallback instructions in case Leaflet authentication fails.

---

## 🔁 PRD Compliance Checklist

Every requirement in the PRD is matched with an existing or planned file:

| Feature                               | File/Page Covered       |
|--------------------------------------|--------------------------|
| User Registration & Login            | `auth/login.php`, `auth/register.php` |
| View Available Bikes                 | `pages/fleet.php`        |
| Make a Reservation                   | `pages/book.php`         |
| Cancel Reservation                   | `pages/dashboard.php`    |
| Payment Processing                   | `pages/payment.php`      |
| Fleet Management (Admin)            | `admin/fleet.php`        |
| Maintenance Scheduling (Admin)      | `admin/maintenance.php`  |
| Damage Reporting                     | `pages/report-damage.php`|
| User Dashboard                       | `pages/dashboard.php`    |
| Admin Dashboard                      | `admin/dashboard.php`    |
| Logout                               | `auth/logout.php`        |
| Responsive Frontend Design           | Tailwind via `assets/css`|
| Interactive Maps via Leaflet         | `assets/js/map.js`, `book.php` |

---

## 📂 Database File

The `velo_rapido.sql` file should define the following tables:
- `users` (user info)
- `bikes` (bike details)
- `reservations`
- `payments`
- `damages`
- `maintenance`

Use this schema to populate XAMPP for local testing.

---

Happy Coding! 🚲✨
