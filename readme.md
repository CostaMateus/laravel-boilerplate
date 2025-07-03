### Laravel Boilerplate

A comprehensive Laravel boilerplate project designed to kickstart your web application development with modern tools, multiple UI frameworks, and best practices.

## 🚀 Features

### Core Framework

- **Laravel 12.0** - Latest Laravel framework with cutting-edge features
- **PHP 8.2+** - Modern PHP with enhanced performance and type safety
- **Laravel Breeze** - Simple authentication scaffolding
- **Laravel UI** - Additional frontend scaffolding options


### Frontend Stack

- **CSS Framework**:
    - **Bootstrap 5.3** - Popular component-based framework

- **JavaScript Libraries**:
    - **Alpine.js** - Lightweight reactive framework
    - **jQuery** - DOM manipulation and plugins

- **Build Tools**:
    - **Vite** - Fast build tool and dev server
    - **Sass** - CSS preprocessor


### Admin Interface

- **AdminLTE 4.0** - Modern admin dashboard template
- **iCheck Bootstrap** - Enhanced checkboxes and radio buttons
- **OverlayScrollbars** - Custom scrollbar solution
- **jQuery Mask Plugin** - Input masking functionality


### Development Tools

#### Code Quality & Analysis

- **PHPStan** - Static analysis tool for PHP
- **Laravel Pint** - Code style fixer based on PHP-CS-Fixer
- **Rector** - Automated code refactoring tool
- **Peck** - Additional testing utilities


#### Testing Framework

- **Pest PHP** - Elegant testing framework
- **Pest Laravel Plugin** - Laravel-specific testing features
- **Pest Type Coverage** - Type coverage analysis
- **Mockery** - Mocking framework for unit tests


#### Development Environment

- **Laravel Sail** - Docker development environment
- **Laravel Debugbar** - Debug toolbar for development
- **Laravel Pail** - Real-time log monitoring
- **Concurrently** - Run multiple commands simultaneously


### Localization

- **Portuguese (Brazil)** - Complete pt-BR localization package


## 📦 Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- Docker (optional, for Sail)


### Quick Start

1. **Clone the repository**

```shellscript
git clone https://github.com/CostaMateus/laravel-boilerplate.git
cd laravel-boilerplate
```


2. **Install PHP dependencies**

```shellscript
composer install
```


3. **Install Node.js dependencies**

```shellscript
npm install
```


4. **Environment setup**

```shellscript
cp .env.example .env
php artisan key:generate
```


5. **Database setup**

```shellscript
php artisan migrate
```


6. **Start development servers**
```bash
# Full development environment (Unix/Linux/macOS)
composer run dev

# Windows-compatible version
composer run dev-windows

# Basic server + assets only
composer run dev-basic
```


## 🛠️ Available Commands

### Development Scripts

#### Full Development Environment (Unix/Linux/macOS)
```bash
composer run dev
```
Starts: Laravel server, Queue worker, Log monitoring (Pail), and Vite dev server

#### Windows-Compatible Development
```bash
composer run dev-windows
```
Starts: Laravel server, Queue worker, and Vite dev server (without Pail)

#### Basic Development
```bash
composer run dev-basic
```
Starts: Laravel server and Vite dev server only

#### Individual Services
```bash
php artisan serve         # Laravel development server
npm run dev               # Vite development server
php artisan queue:listen  # Queue worker
php artisan pail          # Log monitoring (Unix/Linux/macOS only)
```

### Code Quality

```shellscript
# Run all quality checks
composer run test

# Individual tools
composer run pint         # Code formatting
composer run peck         # Additional testing
composer run phpstan      # Static analysis
composer run refactor-dr  # Dry-run refactoring
composer run refactor     # Apply refactoring
```

### Build

```shellscript
npm run build             # Production build
```

## 🎨 Frontend Options

This boilerplate provides multiple frontend approaches:

### 1. Bootstrap + Alpine.js

- Component-based styling with Bootstrap
- Reactive components with Alpine.js
- Modern development experience

### 2. Bootstrap + jQuery

- Traditional component-based styling
- Rich ecosystem of plugins
- Familiar development experience


### 3. AdminLTE Dashboard

- Complete admin interface
- Pre-built components and layouts
- Professional dashboard design


## 🧪 Testing

The project includes a comprehensive testing setup:

```shellscript
# Run tests
./vendor/bin/pest

# Run tests with coverage
./vendor/bin/pest --coverage

# Type coverage analysis
./vendor/bin/pest --type-coverage
```

## 📊 Code Quality Tools

### PHPStan Configuration

- Memory limit: 2GB
- Analyzes the entire `app` directory
- Ensures type safety and catches potential bugs


### Laravel Pint

- Follows Laravel coding standards
- Automatically fixes code style issues
- Based on PHP-CS-Fixer


### Rector

- Automated code refactoring
- Upgrades code to modern PHP standards
- Dry-run option for safe previewing


## 🐳 Docker Support

Laravel Sail is included for containerized development:

```shellscript
# Start Sail environment
./vendor/bin/sail up

# Run commands in Sail
./vendor/bin/sail artisan migrate
./vendor/bin/sail composer install
./vendor/bin/sail npm install
```

## 📁 Project Structure

```plaintext
├── app/
│   ├── Helpers/
│   │   └── Functions.php     # Custom helper functions
│   └── ...                   # Standard Laravel structure
├── resources/
│   ├── css/                  # Stylesheets
│   ├── js/                   # JavaScript files
│   └── views/                # Blade templates
├── tests/                    # Test files
├── composer.json             # PHP dependencies
├── package.json              # Node.js dependencies
└── vite.config.js            # Vite configuration
```

## 🔧 Configuration

### Environment Variables

Key environment variables to configure:

```plaintext
APP_NAME="Laravel Boilerplate"
APP_ENV=local
APP_DEBUG=true
DB_CONNECTION=sqlite
MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
# ... other standard Laravel variables
```

### Custom Helper Functions

The project includes a custom helpers file (`app/Helpers/Functions.php`) that's automatically loaded via Composer's autoload configuration.

## 🤝 Contributing

This boilerplate is designed to be a starting point for Laravel projects. Feel free to:

1. Fork the repository
2. Add your own components and configurations
3. Submit pull requests for improvements
4. Report issues and suggestions


## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🎯 Use Cases

This boilerplate is perfect for:

- **Admin Dashboards** - Complete AdminLTE integration
- **Multi-tenant Applications** - Flexible frontend options
- **API + Frontend** - Laravel backend with modern frontend
- **Rapid Prototyping** - All tools ready to go
- **Learning Projects** - Best practices and modern tools


## 🚀 Getting Started Tips

1. **Choose Your Frontend**: Decide between Bootstrap or AdminLTE based on your project needs
2. **Configure Authentication**: Laravel Breeze is pre-installed for quick auth setup
3. **Set Up Testing**: Use the included Pest configuration for TDD
4. **Code Quality**: Run `composer run test` regularly to maintain code quality
5. **Development Workflow**: Use `composer run dev` for the complete development experience


---

**Happy coding!** 🎉
