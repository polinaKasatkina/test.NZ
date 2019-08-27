<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Project

This project allows to view blog posts and also (for admin users) to create/edit/delete it.


## Technologies

  - MacOS Mojave
  - PHP 7.1
  - Laravel 5.6
  - MySQL 8.0.11
  - MongoDB 4.0.3
  - React 16.2

## Extensions

  - jenssegers/mongodb (https://github.com/jenssegers/laravel-mongodb)
  - cviebrock/eloquent-sluggable (https://github.com/cviebrock/eloquent-sluggable)

## Main points

 - On starting the app run migration and seeder commands to create DB schemas and admin users
 - Admin dashboard is protected by auth middleware


## ReactJS

Using React as a front-end on the main app page (list of blog posts).
Added search by title and ordering by creation date functionality.


## What else can be done

Add ability for users to register in blog app site (using standard register method).
To restrict access to admin panel add Roles table and AdminMiddleware.
Why I didn't do this: It wasn't in main task. But I prepared all migrations for it and a middleware (can be sent separately)

Also was thinking to move all front-end to React using Laravel back-end as an API.
Why I didn't do this:
I prefer to use standard blade in admin functionality and standard back-end validation.
It's easier to manage and allows not to run with huge API controllers instead of Laravel resources controllers.

## Testing

Created couple tests:
- Login (to check login functionality)
- Blogs (checking blog creation, blog url availability)

I could be better in writing tests but I'm ready to learn deeper this point.
