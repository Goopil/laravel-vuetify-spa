[![Build Status](https://travis-ci.org/Goopil/laravel-vuetify-spa.svg?branch=master)](https://travis-ci.org/Goopil/laravel-vuetify-spa)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Goopil/laravel-vuetify-spa/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Goopil/laravel-vuetify-spa/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Goopil/laravel-vuetify-spa/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Goopil/laravel-vuetify-spa/?branch=master)
[![StyleCI](https://styleci.io/repos/124288886/shield?branch=master)](https://styleci.io/repos/124288886)
[![JavaScript Style Guide](https://img.shields.io/badge/code_style-standard-brightgreen.svg)](https://standardjs.com)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

# Laravel-Vue i18n Fullstack SPA Starter

> A Laravel-Vue FullStack SPA starter project template with Vuetify frontend. 

Forked from [https://github.com/elcobvg/laravel-vuetify-spa](https://github.com/elcobvg/laravel-vuetify-spa)

## Features

- Laravel 5.6 + Vue + Vue Router + Vuex
- Frontend built with [Vuetify](https://github.com/vuetifyjs/vuetify) UI framework
- Pages with custom layouts
- Examples for login, register and password reset
- Client-side form validation with [VeeValidate](https://github.com/baianat/vee-validate)
- Integration with [vform](https://github.com/cretueusebiu/vform)
- Authentication with [JWT](https://github.com/tymondesigns/jwt-auth)
- Webpack with [laravel-mix](https://github.com/JeffreyWay/laravel-mix)
- i18n with [vue-i18n](https://github.com/kazupon/vue-i18n) with localization stored in db with [spatie/laravel-translation-loader](https://github.com/spatie/laravel-translation-loader)

## Installation

- `git clone https://github.com/elcobvg/laravel-vuetify-spa.git`
- `cd laravel-vue-spa`
- `cp .env.example .env`
- `composer install`
- `php artisan key:generate`
- `php artisan jwt:secret`
- Edit `.env` and set your database connection details
- `php artisan migrate`
- `php artisan db:seed`
- `npm install` / `yarn`

## Usage

#### Development

```bash
# build and watch
npm run watch

# serve with hot reloading
npm run hot
```

#### Production

```bash
npm run production
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

