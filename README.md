# 🛡️ SERL - Emergency Response System

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white)](https://laravel.com/) 
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)](https://www.php.net/) 
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript) 
[![Leaflet](https://img.shields.io/badge/Leaflet-4CCF00?style=flat&logo=leaflet&logoColor=white)](https://leafletjs.com/)

---

## 📌 Overview

**SERL** is a modern **Emergency Response System** for real-time crisis management.  
It allows users to quickly trigger SOS alerts, manage contacts, and monitor live location on an interactive map.

---

## ⚡ Features

- 🏠 **Dashboard**: Overview of all SOS actions and live location.  
- 🚨 **SOS Alerts**: Quick trigger buttons for Fire, Medical, Police & Secure contacts.  
- 🌍 **Live Map Integration**: Powered by Leaflet.js + Google Geolocation API.  
- 📇 **Contact Management**: Add, edit, and delete emergency contacts.  
- 📱 **Responsive UI**: Works smoothly on desktop and mobile.  
- 🔐 **Secure Authentication**: Powered by Laravel auth system.  

---

## 🛠️ Tech Stack

- **Backend**: Laravel PHP Framework  
- **Frontend**: Blade Templates + Tailwind CSS + JavaScript  
- **Map API**: Leaflet.js + Google Geolocation API  
- **Database**: MySQL / MariaDB  
- **Version Control**: Git + GitHub  

---

## 📂 Project Structure
```
SERL/
├─ app/
├─ resources/
│ ├─ views/
│ │ ├─ dashboard.blade.php
│ │ └─ layouts/
├─ routes/
│ └─ web.php
├─ public/
├─ database/
├─ composer.json
└─ .env.example
```
---

## 🚀 Installation & Setup

1. **Clone the repo**
```bash
git clone https://github.com/LAXMIKANT02/SERL.git
cd SERL
Install dependencies
```
2. **Install dependencies**
```bash
composer install
npm install
npm run build
Setup Environment
```
3. **Setup Environment**
```bash
cp .env.example .env
php artisan key:generate
Update .env with your credentials:
```
***Update .env***
```
GOOGLE_API_KEY=your_google_api_key
DB_DATABASE=your_db
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
Run Database Migrations
```
4. **Run Database Migrations**
```bash
php artisan migrate
Start Development Server
```
5. **Start Development Server**
```bash
php artisan serve
Access at http://127.0.0.1:8000.
```
---
## 🔮 Future Enhancements
🔔 Push notifications for SOS alerts

📊 Advanced analytics for emergency response

👥 Multi-user roles (Admin, User)

📱 Mobile app integration

---

## 🤝 Contribution
 - Fork the repository

 - Create a branch (git checkout -b feature/xyz)

 - Commit changes (git commit -m 'Add xyz feature')

 - Push to branch (git push origin feature/xyz)
  
 - Open a Pull Request

---
## 📜 License
This project is MIT Licensed. See LICENSE for details.

---
## 📫 Contact

- 👤 **Developer**: Laxmikant S  
- 🔗 **GitHub**: [@LAXMIKANT02](https://github.com/LAXMIKANT02)  
- 💼 **LinkedIn**: [Laxmikant S](https://www.linkedin.com/in/laxmikant-s/)  
- 📧 **Email**: [laxmikantofficial02@gmail.com](mailto:laxmikantofficial02@gmail.com)
---
