# Installation steps

1. Clone the repository
2. Run the following command to install the required packages

```bash
# install the composer packages
composer install

# install the npm packages
npm install
```

3. Create a `.env` file by copying the `.env.example` file

```bash
cp .env.example .env
```

4. Generate the application key

```bash
php artisan key:generate
```

5. Create a database and update the `.env` file with the database credentials

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=db_username
DB_PASSWORD=db_password
```

6. Run the following command to migrate the database

```bash
php artisan migrate
```

7. Run the following command to start the server

```bash
# start vite
npm run dev

# start the php server
php artisan serve
```

8. Register a new user and login to the application
9. Visit `/upload-file` to upload a file
