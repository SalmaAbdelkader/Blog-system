
---

```
# 📝 Blog System Laravel Project

This is a complete blog management system built with **Laravel**, allowing users to manage posts, categories, and tags through an admin dashboard. It includes features such as user authentication, image uploads, tag management, and category organization.

## 🚀 Features

- User authentication (login/register/logout)
- Admin panel to manage:
  - Posts (Create, Edit, Delete)
  - Categories (CRUD)
  - Tags (CRUD)
- Upload and display post images
- Tag system with dynamic creation
- Search and filter posts
- Responsive and clean UI using TailwindCSS and Blade components

## 🛠️ Tech Stack

- **Backend**: Laravel 10+
- **Frontend**: Blade, TailwindCSS, Alpine.js
- **Database**: MySQL (or any Laravel-supported DB)
- **Authentication**: Laravel Breeze / Jetstream (or similar)
- **File Storage**: Laravel Filesystem (local)

## 📸 Screenshots

> You can add screenshots here by placing them in a folder and using:

```markdown
![Dashboard](screenshots/dashboard.png)
```

## 📂 Project Structure

```
├── app/
├── resources/views/
│   ├── admin/
│   │   ├── posts/
│   │   ├── categories/
│   │   ├── tags/
├── routes/
│   ├── web.php
├── public/storage/
│   └── uploads/
```

## ⚙️ Installation

1. Clone the repository:

```bash
git clone https://github.com/SalmaAbdelkader/blog-system.git
cd blog-system
```

2. Install dependencies:

```bash
composer install
npm install && npm run dev
```

3. Create your `.env` file:

```bash
cp .env.example .env
php artisan key:generate
```

4. Set up the database:

- Update `.env` with your DB credentials
- Run migrations:

```bash
php artisan migrate
```

5. Create the storage symbolic link:

```bash
php artisan storage:link
```

6. Start the local development server:

```bash
php artisan serve
```

> Visit `http://localhost:8000` in your browser.

---

## 🧪 Testing

You can use Laravel's testing suite (PHPUnit) for feature and unit testing.

```bash
php artisan test
```

---

## 👤 Author

- **Your Name** —[(https://github.com/SalmaAbdelkader)]

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).

---

```

Let me know if you want to include live demo links, contribution guidelines, or a license file too!
