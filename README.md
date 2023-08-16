<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Movie Web Page

This project is a movie website built with Laravel, utilizing Livewire and Jetstream for enhanced functionality and user interaction. It's a space where users can explore popular movies and watch their trailers.

Laravel, a comprehensive PHP framework, forms the backbone of the project, facilitating robust and secure backend operations. Livewire helps in creating dynamic front-end components, reducing dependency on JavaScript. Jetstream adds valuable features like authentication, email verification, and session management, saving time on building these from scratch.

The website has a responsive design, thanks to Tailwind CSS, ensuring an optimal user experience regardless of the device they're using. Tailwind's utility-first approach greatly aids in creating a visually appealing, custom, and mobile-friendly interface.

## Getting Started

First, run these commands in this exact same order:

```bash
composer update
cp .env.example .env
php artisan key:generate
npm install      
npm run build
php artisan migrate
php artisan serve
```

And in order to see the movies you'll need to add your TMDB_API_KEY in .env file

## 🍿 Showcase
| Commission  | Calculator |
|---           |---            |
|<img width="1512" alt="Screenshot 2023-07-06 at 1 53 49 PM" src="https://github.com/Jose-Manuel18/laravel-movie-webpage/assets/103284630/7228936a-722d-4dff-82f3-56e4e4d483cc">|<img width="346" alt="Screenshot 2023-07-06 at 1 54 31 PM" src="https://github.com/Jose-Manuel18/laravel-movie-webpage/assets/103284630/76ce4e47-11f7-4bcb-abd1-660a64c6f657">
