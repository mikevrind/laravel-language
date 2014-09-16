## Laravel Language
[![License](https://poser.pugx.org/mike-vrind/laravel-language/license.svg)](https://packagist.org/packages/mike-vrind/laravel-language)
[![Latest Stable Version](https://poser.pugx.org/mike-vrind/laravel-language/v/stable.svg)](https://packagist.org/packages/mike-vrind/laravel-language)
[![Total Downloads](https://poser.pugx.org/mike-vrind/laravel-language/downloads.svg)](https://packagist.org/packages/mike-vrind/laravel-language)

After a while I always ask myself how many duplicate translations I have made in the course of a project.
That's why I created this package. This package scans the translations of a specific language and checks if there are any duplications within the same language.
If it finds any duplicates, it will notify you about the first occurrence of the translation and where the duplicates are located.

## Installation

Require this package in your composer.json and run composer update:

    "mike-vrind/laravel-language": "dev-master"

After updating composer, add the ServiceProvider to the providers array in app/config/app.php

    'MikeVrind\LaravelLanguage\LaravelLanguageServiceProvider',

When the ServiceProvider has been added, you should be able to run a new artisan command _'language:doubles'_.
This command will scan your translations and provides feedback about any duplicates.

    php artisan language:doubles

## Setting the language
By default, this command will scan the language that has been set as your default in app.locale.
You are able to scan any other language by setting the language option.


    php artisan language:doubles --language=nl

