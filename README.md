# Task Management System

A modern Laravel-based task management application with a clean, intuitive interface for managing your daily tasks and projects.

🔗 **Repository**: [https://github.com/UsmanSaleem707827/task-managment-system](https://github.com/UsmanSaleem707827/task-managment-system)

## Features

- **User Authentication**: Secure login and registration system
- **Task Management**: Create, read, update, and delete tasks
- **Task Filtering**: Filter tasks by status, due date, and search terms
- **Task Sorting**: Sort tasks by title, status, due date, or creation date
- **Status Management**: Track task progress with pending, in progress, and completed statuses
- **Due Date Tracking**: Set and monitor task deadlines with overdue indicators
- **Responsive Design**: Clean, modern UI that works on all devices
- **Pagination**: Efficient handling of large task lists
- **Dashboard**: Overview of task statistics and recent activity

## Requirements

- PHP 8.2
- Composer
- Laravel 11
- MySQL or any other supported database system
- Node.js and NPM (for frontend assets)

## Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/UsmanSaleem707827/task-managment-system.git
   cd task-managment-system
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

2. **Configure Environment**
   - Copy `.env.example` to `.env`
   - Update database configuration in `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=task_manager
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

3. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

4. **Create Database**
   Create a new database named `task_manager` (or whatever you specified in `.env`)

5. **Run Migrations**
   ```bash
   php artisan migrate
   ```

6. **Seed Database (Optional)**
   ```bash
   php artisan db:seed
   ```

7. **Install Frontend Dependencies**
   ```bash
   npm install
   npm run dev
   ```

8. **Serve the Application**
   ```bash
   php artisan serve
   ```

   The application will be available at `http://localhost:8000`

## Usage

### Getting Started

1. **Register**: Create a new account or use existing credentials
2. **Login**: Access your personal task dashboard
3. **Create Tasks**: Add new tasks with titles, descriptions, and due dates
4. **Manage Tasks**: Edit, update status, or delete tasks as needed
5. **Filter & Sort**: Use the built-in filtering and sorting options to organize your tasks

### Task Features

- **Task Creation**: Add detailed task information including title, description, and due date
- **Status Updates**: Change task status between pending, in progress, and completed
- **Due Date Management**: Set deadlines and receive visual overdue indicators
- **Search & Filter**: Find tasks quickly using search and filter options
- **Sorting**: Organize tasks by various criteria (title, status, due date, creation date)

### Dashboard

The dashboard provides:
- Task statistics overview
- Recent task activity
- Quick navigation to main features
- User-specific task counts

## Technology Stack

- **Backend**: Laravel 11, PHP 8.2
- **Frontend**: Bootstrap 5, jQuery
- **Database**: MySQL
- **Icons**: Bootstrap Icons
- **Styling**: Custom CSS with Bootstrap framework

## Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   └── TaskController.php
│   └── Models/
│       ├── Task.php
│       └── User.php
├── database/
│   ├── factories/
│   │   └── TaskFactory.php
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── tasks/
│       ├── auth/
│       └── layouts/
└── routes/
    └── web.php
```

## Contributing

1. Fork the repository: [https://github.com/UsmanSaleem707827/task-managment-system](https://github.com/UsmanSaleem707827/task-managment-system)
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License

This project is open-source and available under the [MIT License](LICENSE).

## Support

For issues and questions, please create an issue in the project repository:
[https://github.com/UsmanSaleem707827/task-managment-system/issues](https://github.com/UsmanSaleem707827/task-managment-system/issues)

## Author

**Usman Saleem**
- GitHub: [@UsmanSaleem707827](https://github.com/UsmanSaleem707827)
- Repository: [task-managment-system](https://github.com/UsmanSaleem707827/task-managment-system)
