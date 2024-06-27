# Cashify

Cashify is an open-source web application for budget tracking, designed to help you manage your finances with ease. Built with modern technologies, it offers a responsive and intuitive interface for tracking transactions, managing accounts, and categorizing expenses.

## Website

Cashify is live at [cashify.space](https://cashify.space)

Proudly hosted with [Laravel Forge](https://forge.laravel.com) and [DigitalOcean](https://www.digitalocean.com).

## Features

- **Transactions**: Log and manage your income and expenses
- **Accounts**: Keep track of multiple financial accounts in one place
- **Categories**: Organize your transactions with customizable categories

## Upcoming Features

Here are some features that are planned:

- Goals: Set and track financial goals
- Deep spending inspections: Gain insights into your spending habits
- Scheduled transactions: Set up recurring transactions for better forecasting

## Technologies Used

- [Laravel](https://laravel.com/) - PHP framework for robust backend development
- [Alpine.js](https://alpinejs.dev/) - Lightweight JavaScript framework
- [Tailwind CSS](https://tailwindcss.com/) - Utility-first CSS framework
- [HTMX](https://htmx.org/) - High-power tools for HTML

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/yyordan0v/cashify.git
   ```

2. Navigate to the project directory:
   ```
   cd cashify
   ```

3. Install PHP dependencies:
   ```
   composer install
   ```

4. Install JavaScript dependencies:
   ```
   npm install
   ```

5. Copy the `.env.example` file to `.env` and configure your environment variables:
   ```
   cp .env.example .env
   ```

6. Generate an application key:
   ```
   php artisan key:generate
   ```

7. Run database migrations:
   ```
   php artisan migrate
   ```

8. Compile assets:
   ```
   npm run dev
   ```

9. Start the development server:
   ```
   php artisan serve
   ```

Visit `http://localhost:8000` in your browser to access Cashify.

## License

Cashify is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

For any questions or support, please [open an issue](https://github.com/yyordan0v/cashify/issues) or contact the maintainer.

Thank you for using or contributing to Cashify!
