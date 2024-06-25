
# Sea Salon Admin Apps

Sea salon admin apps is an admin application that has the aim of making it easier for admins to add services contained in the salon and add data on salon branch locations. This application can only be used by admins who have been assigned. This application is made using the Php programming language and uses the Laravell framework and MySQL database.


# Table of Contents

- [Features](#Features)
- [Requirements](#Requirements)
- [Installation](#Installation)



# Features
- Admin dashboard
- Adding data services
- Add salon branch data
- Edit and delete data
- Login for admin only



# Requirements
Before installing, make sure you have the following requirements:

- PHP v8.1
- Composer
- Nodejs & NPM
- MySQL
- Laravel v9.x


## Installation
Follow these steps to install this app on your local machine.

1. **Clone Repository**
```bash
    git clone https://github.com/MuhammadIbraAlfathar/sea-salon-backend-app.git
    cd repository
```


2. **Install Dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Konfigurasi Environment**

    Copy file `.env.example` into `.env` and customize the necessary configurations such as the database.

    ```bash
    cp .env.example .env
    ```

    **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

4. **Migration Database**

    Run the database migration:

    ```bash
    php artisan migrate
    ```

5. **Build Frontend Assets**

    Build frontend assets using Vite:

    ```bash
    npm run dev
    ```

6. **Run Server**

    Run a local Laravel server:

    ```bash
    php artisan serve
    ```



## Screenshots

<p float="left">
  <img src="https://github.com/MuhammadIbraAlfathar/assetsweb/blob/main/WhatsApp%20Image%202024-06-25%20at%207.46.22%20AM.jpeg?raw=true" width="200" />
  <img src="https://github.com/MuhammadIbraAlfathar/assetsweb/blob/main/WhatsApp%20Image%202024-06-25%20at%207.46.44%20AM.jpeg?raw=true" width="200" /> 
  <img src="https://github.com/MuhammadIbraAlfathar/assetsweb/blob/main/WhatsApp%20Image%202024-06-25%20at%207.46.51%20AM.jpeg?raw=true" width="200" />
  <img src="https://github.com/MuhammadIbraAlfathar/assetsweb/blob/main/WhatsApp%20Image%202024-06-25%20at%207.46.58%20AM.jpeg?raw=true" width="200" />
  <img src="https://github.com/MuhammadIbraAlfathar/assetsweb/blob/main/WhatsApp%20Image%202024-06-25%20at%207.47.07%20AM.jpeg?raw=true" width="200" />
  <img src="https://github.com/MuhammadIbraAlfathar/assetsweb/blob/main/WhatsApp%20Image%202024-06-25%20at%207.47.20%20AM.jpeg?raw=true" width="200" />
  <img src="https://github.com/MuhammadIbraAlfathar/assetsweb/blob/main/WhatsApp%20Image%202024-06-25%20at%207.47.26%20AM.jpeg?raw=true" width="200" />
  <img src="https://github.com/MuhammadIbraAlfathar/assetsweb/blob/main/WhatsApp%20Image%202024-06-25%20at%207.47.38%20AM.jpeg?raw=true" width="200" />
</p>


## Additional

**Website link that has been deployed :**  [Seasallon](http://seasalonapps.my.id/dashboard) 

