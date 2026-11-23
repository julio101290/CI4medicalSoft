<div align="center">

# 🏥 CI4 MedicalSoft

**Open-source medical clinic and patient management system built with CodeIgniter 4.**

[![Latest Stable Version](https://poser.okvpn.org/julio101290/ci4medical-soft/v/stable)](https://packagist.org/packages/julio101290/ci4medical-soft) [![Total Downloads](https://poser.okvpn.org/julio101290/ci4medical-soft/downloads)](https://packagist.org/packages/julio101290/ci4medical-soft) [![Latest Unstable Version](https://poser.okvpn.org/julio101290/ci4medical-soft/v/unstable)](https://packagist.org/packages/julio101290/ci4medical-soft) [![License](https://poser.okvpn.org/julio101290/ci4medical-soft/license)](https://packagist.org/packages/julio101290/ci4medical-soft)

[Live Demo](#-live-demo) • [Features](#-features) • [Installation](#-installation--updates) • [Desktop Installer](#-windows-desktop-installer) • [Screenshots](#-screenshots)

</div>

---

## 📋 Overview

**CodeIgniter 4 MedicalSoft** is a lightweight, modular web application designed to streamline clinic and medical office operations—covering patient records, medical history, appointment scheduling, consultations, and PDF prescription printing.

> [!NOTE]
> This project is under active development. Initial stable versions are available and continuously improved as issues are reported and resolved.

---

## ✨ Features

- **Patient Management (CRUD):** Create, edit, search, and manage patient records and medical histories.
- **Medication Catalog:** Add, update, and organize available medications.
- **Diagnoses & Illnesses Catalog:** Maintain a structured catalog of diagnoses and medical conditions.
- **Appointment Scheduling:** Register and manage medical appointments.
- **Medical Consultations:** Record consultation notes, diagnoses, and prescribed treatments.
- **PDF Prescription Printing:** Generate and print ready-to-use medical prescriptions in PDF format.
- **Hospital & Clinic Settings:** Configure general clinic details and system preferences.

---

## 🌐 Live Demo

Try the application online before installing:

| Field | Value |
| :--- | :--- |
| **URL** | [https://medicalsoft.cesarsystems.com.mx/](https://medicalsoft.cesarsystems.com.mx/) |
| **Username** | `user` |
| **Password** | `super-user` |

---

## ⚙️ Server Requirements

- **PHP 7.4 or higher** *(PHP 8.1+ required for CodeIgniter 4.5+)*
- **Required extensions:**
  - `intl`
  - `mbstring`
  - `mysqlnd`
  - `json` *(enabled by default — do not disable)*
  - `xml` *(enabled by default — do not disable)*
- **Optional extensions:**
  - `libcurl` *(required if using the `HTTP\CURLRequest` library)*

---

## 🚀 Installation & Updates

### 1. Install via Composer

Run the following command to create a new project:

```bash
composer create-project julio101290/ci4medical-soft
```

### 2. Environment Configuration

Copy the sample environment file and update it with your application's `app.baseURL` and database credentials:

```bash
cp env .env
```

### 3. Database Setup

Import the SQL schema file located at:

```text
database/medicalsoft2022.sql
```

*(Database migrations to automate table creation are planned for upcoming updates.)*

### 4. Web Server Configuration (`public/index.php`)

> [!IMPORTANT]
> `index.php` is located inside the `public/` directory—**not** in the project root—for better security and separation of components.
>
> Configure your web server (e.g., via a Virtual Host) to point its document root directly to the `public/` folder. Pointing your server to the project root and accessing `/public` exposes application logic and framework files and is strongly discouraged. See the [CodeIgniter 4 User Guide](https://codeigniter.com/user_guide/) for details.

### 5. Keeping Up to Date

Whenever a new version of the framework is released, run:

```bash
composer update
```

Check the release notes after updating to verify whether any changes need to be merged into your `app/` directory from `vendor/codeigniter4/framework/app`.

---

## 💻 Windows Desktop Installer

For a quick local setup without configuring a web server manually, you can use the Windows desktop installer.

<details>
<summary><strong>Click to expand step-by-step installation guide</strong></summary>

<br>

1. **Launch the installer** to start the setup wizard.

   ![Installer welcome screen](https://thumbs.odycdn.com/a80d3949d1faab179a9c5ca0eb77d6b8.webp)

2. **Select destination folder:** Keep the default installation path and click **Next**.

   ![Destination path](https://thumbs.odycdn.com/38f8b800ede030eb9d163c588f43f71d.webp)

3. **Create shortcut:** Check the box to create a desktop shortcut and click **Next**.

   ![Create desktop shortcut](https://thumbs.odycdn.com/5a9d482d3e458162be2f0ffa781e763e.webp)

4. **Review settings:** Verify the installation summary is correct.

   ![Verify installation info](https://thumbs.odycdn.com/5f3a3b7511b22b0df964939778b4eafd.webp)

5. **Install:** Click **Install** and wait for the setup to finish.

   ![Installing MedicalSoft](https://thumbs.odycdn.com/2e6242443a51497bd0d3800d388f8c9e.webp)

6. **Sign in:** Once finished, the login window will open. Use the default credentials:
   - **Username:** `admin`
   - **Password:** `super-admin`

   > [!TIP]
   > If the login screen appears blank on first launch, simply close the window and reopen the application.

   ![Login screen](https://github.com/user-attachments/assets/8503bab1-7f4c-4d8b-8319-021590035f4d)

7. **Start using MedicalSoft:** After logging in, the main dashboard will appear.

   ![Main dashboard](https://github.com/user-attachments/assets/0b185e64-eb81-4119-971f-63fc0500e017)

</details>

---

## 📸 Screenshots

| | |
| :---: | :---: |
| ![Screenshot 1](https://thumbs.odycdn.com/dfad55329694dace94abf4b6c9ff3fd6.webp) | ![Screenshot 2](https://thumbs.odycdn.com/7d4c5c58c0f3f3063400f3179e4ef41e.webp) |
| ![Screenshot 3](https://thumbs.odycdn.com/e1bf7ce98e4a3a3e0945658daa532c9d.webp) | ![Screenshot 4](https://thumbs.odycdn.com/1dfacdb4f7c489325c7407c09c62e33e.webp) |
| ![Screenshot 5](https://thumbs.odycdn.com/839124795686bb19c6e28b4a6624b07b.webp) | ![Screenshot 6](https://thumbs.odycdn.com/44873800b2f5756fe5da046dd64f355c.webp) |
| ![Screenshot 7](https://thumbs.odycdn.com/6b45d82b54de91c8d9277e99718c5ddc.webp) | ![Screenshot 8](https://thumbs.odycdn.com/af78139fcf9a32b60871794ea8381c17.webp) |
| ![Screenshot 9](https://thumbs.odycdn.com/666705540d8dccafdad135a7ec61282b.webp) | ![Screenshot 10](https://github.com/user-attachments/assets/37a2a5b8-1be0-4eb4-b9d7-758e234b1f72) |

![Screenshot 11](https://github.com/user-attachments/assets/f7ad7054-d8e8-4bcb-ae00-37db6e4da631)
