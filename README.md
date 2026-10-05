# POS Midterm Fresh

CodeIgniter 4 Point-of-Sale system for IT0049.

## Included features

- Staff login/logout with hashed passwords
- Product, customer, and staff CRUD
- Product image and staff avatar uploads
- Validation and image type/size restrictions
- Record sale with stock checking and automatic inventory deduction
- Sales history
- MySQL schema and seeder

## Setup in XAMPP

1. Create the project with CodeIgniter AppStarter, then copy this folder's `app`, `public`, `database`, and `writable` contents into it.
2. Create a MySQL database named `pos_database` in phpMyAdmin.
3. Import `database/pos_database.sql` in phpMyAdmin.
4. Copy `.env.example` to `.env` and set the database values.
5. Run:

```cmd
php spark db:seed PosSeeder
php spark serve
```

Open `http://localhost:8080/login`.

Demo login: `admin` / `password`

## Important

Run the application through `php spark serve` or configure Apache's document root to the project's `public` folder. Do not expose the project root directly.
