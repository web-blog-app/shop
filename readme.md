

## Installation

1. Clone the repo and `cd` into it
1. `composer install`
1. Rename or copy `.env.example` file to `.env`
1. `php artisan key:generate`
1. Set your database credentials in your `.env` file
1. Set your Stripe credentials in your `.env` file. Specifically `STRIPE_KEY` and `STRIPE_SECRET`
1. Set your Algolia credentials in your `.env` file. Specifically `ALGOLIA_APP_ID` and `ALGOLIA_SECRET`. See [this episode](https://www.youtube.com/watch?v=Sa0R_2aHICw&index=22&list=PLEhEHUEU3x5oPTli631ZX9cxl6cU_sDaR).
1. Set your Braintree credentials in your `.env` file if you want to use PayPal. Specifically `BT_MERCHANT_ID`, `BT_PUBLIC_KEY`, `BT_PRIVATE_KEY`. See [this episode](https://www.youtube.com/watch?v=pv8pxwBxfA4). If you don't, it should still work but won't show the paypal payment at checkout.
1. Set your `APP_URL` in your `.env` file. This is needed for Voyager to correctly resolve asset URLs.
1. Set `ADMIN_PASSWORD` in your `.env` file if you want to specify an admin password. If not, the default password is 'password'
1. `php artisan ecommerce:install`. This will migrate the database and run any seeders necessary. See [this episode](https://www.youtube.com/watch?v=L3EbWJmmyjo&index=18&list=PLEhEHUEU3x5oPTli631ZX9cxl6cU_sDaR).
1. `npm install`
1. `npm run dev`
1. `php artisan serve` or use Laravel Valet or Laravel Homestead
1. Visit `localhost:8000` in your browser
1. Visit `/admin` if you want to access the Voyager admin backend. Admin User/Password: `admin@admin.com/password`. Admin Web User/Password: `adminweb@adminweb.com/password`


