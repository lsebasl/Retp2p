<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Project Store

In this code we can find the simulation of a virtual store with administrative interface and online customer experience.

### Instructions for installation.

1.clone the repository
2.composer install
3.run cp .env.example .env
4.create and config database
5.php artisan key generate
6.install and config redis to cache
7.php artisan config:cache
8.php artisan migrate --seed
9.php artisan passport:install
10.php artisan storage:link
11.npm install
12.npm audit fix --force
13.npm run watch

### Documentation Api Product.

Allows you to manage the products of the project store, list, store, update, delete.

[documentation](https://isebasi.stoplight.io/studio/retp2p/edit)
