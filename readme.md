<p align="center">Temper Insights</p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Temper Insights

* Get insight of how users flow through the onboarding process.
* Get insight in how the onboarding process improves over time.
* Get information on where we should improve the onboarding; where do users get stuck?

##  Please run following commands to set up the project ##

* type `git clone https://github.com/gayathma/temperinsights.git` to clone the repository or download as a zip file and unzip it in your folder.  
* type `cd temperinsights`
* type `composer install`
* copy *.env.example* to *.env*
* create database `temperinsights` using mysql 
* update `DB_DATABASE, DB_USERNAME, DB_PASSWORD` values in .env file
* type `php artisan migrate`
* import export.csv file data `insights` table of the database
* type `php artisan serve` with the given url you can access the application in the browser

### Features ###

* Home Page with weekly retention chart
* Custom error pages 403, 404 and 503

![Alt text](/screenshots/sc1.png?raw=true "Home Page")


### Tests ###

This project has been developed using Test Driven Development. PHPUnit is used to run the testcases. You can refer the index.html file inside /coverage folder to analyze code coverage statistics.

![Alt text](/screenshots/sc2.png?raw=true "Code Coverage Stats")

### Implemented Files ###

* InsightController        -> /app/Http/Controllers/InsightController.php
* InsightTest              -> /tests/Feature/InsightTest.php
* Home Page View           -> /resources/views/insights/index.blade.php
* App View                 -> /resources/views/layout/app.blade.php
* Error Pages              -> /resources/views/errors/*

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
