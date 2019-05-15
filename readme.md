
## Voucher Management System

## About Voucher Management System

Voucher Management System is a web application for manage voucher. You can create and manage your voucher.
Voucher Management System is used PHP with Laravel Framework and use MySQL for Database.

![screenshot 1](https://cdn.arthanugraha.com/image/voucher/voucher-management-system-landing-page.png)
![screenshot 2](https://cdn.arthanugraha.com/image/voucher/voucher-management-system-backend.png)

## How To Use
You can generate Database via migration and setup your mail at .env

## Application Flow
1. a kind of voucher must be create first by Administrator.
2. Every kind voucher can use with maximal quantity of voucher and expire date.
3. Visitor can create voucher at landing page and Administrator can create voucher at back end.
4. Customer can only have one  valid voucher.
5. Email will send to customer after create a voucher. Email contain voucher code and instruction for check validation code or register code.
6. Customer can register code by contact Administrator then Administrator will register at backend.
7. Voucher can register one time only.

## Requirement

You can install the package before:

```bash
composer require guzzlehttp/guzzle
```

or just update via composer
```bash
composer update
```

## Customization

Email validation is provide by mailboxlayer.com API. Please register and you can get 250 hit to API for free per month.

Then add this code at config/app.php :

```php
// in config/app.php

// ...

/*
    |--------------------------------------------------------------------------
    | MailBoxLayer Key
    |--------------------------------------------------------------------------
    |
    | Setup mailboxlayer key
    |
    */

    'mailboxlayerkey' => env('MAILBOX_LAYER_KEY', null),
```

Please input your key at .env too with this code :

```php
MAILBOX_LAYER_KEY="YOUR_KEY_HERE"
```

## Application Demo
url:  [http://voucher.riato.website/](http://voucher.riato.website/)
<br />
Login: [http://voucher.riato.website/login](http://voucher.riato.website/login)
<br />
user: admin@admin.com
<br />
password: password

## Developer

Voucher Management System is develop by KisiKoso Labs.

## Security Vulnerabilities

If you discover a security vulnerability within this application, please send an e-mail to [me@arthanugraha.com](mailto:me@arthanugraha.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
