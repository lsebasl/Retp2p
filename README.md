<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Project Store

In this code we can find the simulation of a virtual store with administrative interface and online customer experience.

### Instructions for installation.

<ul>
<li>1.clone the repository</li>
<li>2.composer install</li>
<li>3.run cp .env.example .env</li>
<li>4.create and config database</li>
<li>5.php artisan key generate</li>
<li>6.install and config redis to cache</li>
<li>7.php artisan config:cache</li>
<li>8.php artisan migrate --seed</li>
<li>9.php artisan passport:install</li>
<li>10.php artisan storage:link</li>
<li>11.npm install</li>
<li>12.npm audit fix --force</li>
<li>13.npm run watch</li>
</ul>

### Documentation Api Product.

Allows you to manage the products of the project store, list, store, update, delete.

[documentation](https://isebasi.stoplight.io/docs/retp2p/reference/Products-Manager.v1.yaml/paths/api~1products~1%7Bid%7D/get)
