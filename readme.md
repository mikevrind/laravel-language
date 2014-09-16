## Laravel Language

After a while I always ask myself how many duplicate translations I have made in the course of a project.
That's why I created this package. This package scans the translations of a specific language and checks if there are any duplications within the same language.
If it finds any duplicates it will notify you about the first occurrence of the translation and where the duplicates are located.

This just is a very early release because I wanted to get the basic code done for some testing.


## Installation

Require this package in your composer.json and run composer update:

    "mikevrind/laravel-language": "dev-master"

After updating composer, add the ServiceProvider to the providers array in app/config/app.php

    'MikeVrind\LaravelLanguage\LaravelLanguageServiceProvider',