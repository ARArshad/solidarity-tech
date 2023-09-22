# solidarity-tech

## Setup

All environments expects the following dependencies to be installed:
-   [Composer](https://getcomposer.org/), a PHP package manager

Once all the above dependencies are installed, you can proceed with the rest of the setup:

```bash
git clone https://github.com/ARArshad/solidarity-tech

composer install
```

You'll then need to setup your environment variables

```bash
cp .env.example .env
```


Run This Commands for Database Tables

```bash
# insert all table into datbase 
php artisan migrate
```

Test Mail trap Credentials
```bash
# You Need to Add Credential in Environment File For Sending Email After Create Booking 
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=Your_Mail_TRAP_USERNAME
MAIL_PASSWORD=Your_MAIL_TRAP_PASSWORD
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=test@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

Run Commands for seeder

```bash
# insert data into database 
php artisan db:seed
```

Run Commands for Migration



