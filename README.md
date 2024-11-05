[![Latest Stable Version](http://poser.pugx.org/julio101290/ci4medical-soft/v)](https://packagist.org/packages/julio101290/ci4medical-soft) [![Total Downloads](http://poser.pugx.org/julio101290/ci4medical-soft/downloads)](https://packagist.org/packages/julio101290/ci4medical-soft) [![Latest Unstable Version](http://poser.pugx.org/julio101290/ci4medical-soft/v/unstable)](https://packagist.org/packages/julio101290/ci4medical-soft) [![License](http://poser.pugx.org/julio101290/ci4medical-soft/license)](https://packagist.org/packages/julio101290/ci4medical-soft) [![PHP Version Require](http://poser.pugx.org/julio101290/ci4medical-soft/require/php)](https://packagist.org/packages/julio101290/ci4medical-soft)


I am pleased to announce that we already have the first versions of the medical software on which we have been working, details may still emerge, but they are being corrected

## What is CodeIgniter 4 medicalSoft?
CodeIgniter 4 medicalSoft is a basic software for the correct administration/handling of the patient catalog, medical history, date control, printing of prescriptions.
Characteristics

1. Registrations, Cancellations and changes of Patients
2. Registrations, cancellations and changes Medications
3. discharges, discharges and changes in diagnoses/illnesses
4. Registration of Medical Appointments
5. Register medical consultation
6. Print medical prescription in PDF
7. General Hospital Configurations

## Installation and updates

Manual installation via composer is a simple one run

	composer create-project julio101290/ci4medical-soft 

And then composer update every time there is a new version of the framework.
When updating, check the release notes to see if there are any changes you need to apply to your app folder. Affected files can be copied or merged from vendor/codeigniter4/framework/app.

Copy env to .env and customize it for your application, specifically the baseURL and any database settings.
Database

You can find the database file in the database in the database/medicalsoft2022.sql folder
Soon we will create the migration files to build the tables without having to run the .sql file
Additionally, as changes are made, we will generate an installable application for Windows so that installation is as easy as possible.

## Desktop app installer
![image](https://thumbs.odycdn.com/a80d3949d1faab179a9c5ca0eb77d6b8.webp)

On the route we leave it as it is and click on the next button

![image](https://thumbs.odycdn.com/38f8b800ede030eb9d163c588f43f71d.webp)

We activate the box so that the direct access to the desktop is generated

![image](https://thumbs.odycdn.com/5a9d482d3e458162be2f0ffa781e763e.webp)

We verify that the information is correct

![image](https://thumbs.odycdn.com/5f3a3b7511b22b0df964939778b4eafd.webp)

Once you click it, it will begin to install

![image](https://thumbs.odycdn.com/2e6242443a51497bd0d3800d388f8c9e.webp)

Once finished, the login window appears. If the screen appears blank, close the window and open it again. The user is admin and the password is super-admin.

![image](https://thumbs.odycdn.com/e9a740a7f56d375ded4cb470573c0195.webp)

Once entered into the system, it will show us the main screen and we can start using the MedicalSoft system.

![image](https://thumbs.odycdn.com/bda55019fad5872869d7cc5244fb5ad4.webp)


## Important change with index.php

index.php is no longer in the project root! It has been moved inside the public folder for better security and separation of components.

This means that you must configure your web server to “point” to your project's public folder and not to the project root. A best practice would be to configure a virtual host to point there. Bad practice would be to point your web server at the root of the project and expect to enter public/…, as the rest of your logic and the framework are exposed.

Please read the user guide for a better explanation of how CI4 works!
Server requirements
PHP version 7.4 or higher is required, with the following extensions installed:
•	intl
•	libcurl if you plan to use HTTP\CURLRequest library

Also, make sure the following extensions are enabled in your PHP:
•	json (enabled by default – do not turn it off )
•	mbstring
•	mysqlnd
•	xml ( enabled by default – do not turn it off )

Demo at https://medicalsoft.cesarsystems.com.mx/ user:user password:super-user


## Screenshots

![image](https://thumbs.odycdn.com/dfad55329694dace94abf4b6c9ff3fd6.webp)

![image](https://thumbs.odycdn.com/7d4c5c58c0f3f3063400f3179e4ef41e.webp)

![image](https://thumbs.odycdn.com/e1bf7ce98e4a3a3e0945658daa532c9d.webp)

![image](https://thumbs.odycdn.com/1dfacdb4f7c489325c7407c09c62e33e.webp)

![image](https://thumbs.odycdn.com/839124795686bb19c6e28b4a6624b07b.webp)

![image](https://thumbs.odycdn.com/44873800b2f5756fe5da046dd64f355c.webp)

![image](https://thumbs.odycdn.com/6b45d82b54de91c8d9277e99718c5ddc.webp)

![image](https://thumbs.odycdn.com/af78139fcf9a32b60871794ea8381c17.webp)

![image](https://thumbs.odycdn.com/666705540d8dccafdad135a7ec61282b.webp)

![image](https://thumbs.odycdn.com/4a56e92bb38dcbc765ae410786594b33.webp)

![image](https://thumbs.odycdn.com/b5ecce0b95e0893d7b4cd3187d382d99.webp)
