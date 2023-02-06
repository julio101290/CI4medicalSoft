  # CodeIgniter 4 MedicalSoft
  [![Latest Stable Version](http://poser.pugx.org/julio101290/ci4medical-soft/v)](https://packagist.org/packages/julio101290/ci4medical-soft) [![Total Downloads](http://poser.pugx.org/julio101290/ci4medical-soft/downloads)](https://packagist.org/packages/julio101290/ci4medical-soft) [![Latest Unstable Version](http://poser.pugx.org/julio101290/ci4medical-soft/v/unstable)](https://packagist.org/packages/julio101290/ci4medical-soft) [![License](http://poser.pugx.org/julio101290/ci4medical-soft/license)](https://packagist.org/packages/julio101290/ci4medical-soft) [![PHP Version Require](http://poser.pugx.org/julio101290/ci4medical-soft/require/php)](https://packagist.org/packages/julio101290/ci4medical-soft)

## What is CodeIgniter 4 medicalSoft?

CodeIgniter 4 medicalSoft is a  basic software for el correct administration/manage of the patienst's catalogue, medical history, control dates, print prescription .

## Features

* CRUD Patients
* CRUD Medicines
* CRUD diagnoses / diseases
* Record Dates
* Record medical consultation
* Print in PDF prescription medical
* Settings General of the Hospital

## Installation & updates

`composer create-project julio101290/ci4medical-soft` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Database
You can find the database file under database in the database/medicalsoft2022.sql folder

Soon we will create the migration files to build the tables without having to run the .sql file

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
