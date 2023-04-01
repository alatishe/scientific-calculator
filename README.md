<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Scientific Calculator

A web-based calculator built using Laravel and Vue.js that allows users to perform various scientific calculations.


- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)


## Features

- Basic arithmetic operations (addition, subtraction, multiplication, division)
- Scientific functions (sin, cos, tan, log, etc.)
- Parentheses support
- History of calculations


## Installation

To use this calculator, you need to have [Laravel](https://laravel.com/docs/8.x/installation) and [Composer](https://getcomposer.org/) installed on your machine.

1. Clone the repository to your local machine: ``git clone https://github.com/yourusername/laravel-scientific-calculator.git``

2. Install the required dependencies: ``cd laravel-scientific-calculator
composer install
npm install``

3. Copy the `.env.example` file and rename it to `.env`. Update the database configuration settings to match your local environment.

4. Generate an application key: ``php artisan key:generate ``

5. Run the database migrations: ``php artisan migrate``

6. Start the development server: ``php artisan serve ``

You can now access the calculator at `http://localhost:8000`.

## Usage

To use the calculator, enter an expression in the input field and click the "=" button. The result will be displayed in the input field.

You can use the following operators:

- Addition: `+`
- Subtraction: `-`
- Multiplication: `*`
- Division: `/`
- Exponentiation: `^`
- Modulus: `%`

You can use the following functions:

- Sine: `sin()`
- Cosine: `cos()`
- Tangent: `tan()`
- Arcsine: `asin()`
- Arccosine: `acos()`
- Arctangent: `atan()`
- Natural logarithm: `log()`
- Square root: `sqrt()`

You can use parentheses to group expressions together.

## Contributing

Contributions to this project are welcome. If you notice any bugs or have any suggestions for new features, please open an issue or submit a pull request.

Before contributing, please read the [contributing guidelines](CONTRIBUTING.md) for this project.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
