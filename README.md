# Cashify

Cashify is an open-source personal finance management application designed to help you track your budget, manage expenses, and gain insights into your financial habits. Built with modern web technologies, it offers a responsive and intuitive interface for all your financial tracking needs.

## Demo

![Cashify Demo](https://postimg.cc/GBK5pX34)
[Cashify Demo](https://youtu.be/8P-zu8VvGQo)

Click the link above to watch a demonstration of Cashify's features and interface.

## Features

### Dashboard

- Comprehensive financial overview with interactive charts
- Summary cards showing income, expenses, and balance
- Recent transactions organized in three tabs (All/Expenses/Income)
- Quick access to all accounts with current balances

### Transactions

- Detailed transaction management with infinite scrolling powered by HTMX
- Full CRUD capabilities for all transactions
- Filtering and sorting options
- Seamless editing experience without page reloads

### Accounts

- Create and manage multiple financial accounts in one place
- Transfer funds between accounts with automatic transaction logging
- Customize accounts with color badges for easy recognition
- Track account balances and transaction history

### Categories

- Organize transactions with customizable categories
- Interactive color selection for visual organization
- Icon filtering system with metadata tagging
- Personalized category management for both income and expenses

### Additional Features

- Full localization support for English and Bulgarian
- Responsive design optimized for all devices
- GitHub authentication via Laravel Socialite
- Detailed financial statistics and trends

## Technologies Used

- **Backend**: [Laravel](https://laravel.com/) - PHP framework providing a robust foundation
- **Authentication**: Laravel Breeze with [Laravel Socialite](https://laravel.com/docs/socialite) for GitHub integration
- **Frontend Interaction
  **: [Alpine.js](https://alpinejs.dev/) - Lightweight JavaScript framework for interactive components
- **UI Enhancement**: [HTMX](https://htmx.org/) - Modern approach to dynamic content without heavy JavaScript
- **Styling**: [Tailwind CSS](https://tailwindcss.com/) - Utility-first CSS framework for custom UI components
- **Database**: SQLite for reliable data storage
- **Charting**: Apex Charts for visualizations

## Technical Highlights

- **Custom UI Components**: Mostly built from scratch without relying on UI libraries
- **Infinite Scrolling**: Implemented with HTMX for efficient transaction browsing
- **Dynamic Interactions**: Smooth HTMX and Alpine.js integration for responsive feel
- **Metadata-Driven Icons**: Category icon filtering with configurable metadata tags

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
