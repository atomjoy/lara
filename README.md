# Lara Email Notification Theme in Laravel 13

Lara is a custom theme for HTML email notifications in Laravel 13.

## Install

```sh
composer create-project laravel/laravel:^13 test
cd test
composer require atomjoy/lara:^1.0
```

### After Install

```sh
# Config package
php artisan vendor:publish --provider='Lara\LaraServiceProvider'

# Publish email images to public/vendor/lara
php artisan vendor:publish --tag=lara-images --force
```

## Show Lara Email Theme

Lara email notification example in **LaraNotificanion** class.

```php
<?php

use Illuminate\Support\Facades\Route;
use Lara\Notifications\LaraNotificanion;

// Display email in browser
Route::get('/lara', function () {
    return (new LaraNotificanion())->toMail(User::first());
});
```

## Run

```sh
npm install
npm run build
php artisan serve
php artisan serve --host=localhost --port=8000
```

## How To Use

In the terminal, type **php artisan make:notification EmailNotification** to create notification class, then update methods.

```php
<?php

public function via(object $notifiable): array
{
    return ['mail'];
}

public function toMail(object $notifiable): MailMessage
{
    // Page url
    $host = app()->request->getSchemeAndHttpHost();

    // Lara config email template links and images always with https://
    config([
        // Show or change
        'mail.email.browser' => $host . "/show/email/123",
        // 'mail.email.logo' =>  $host . "/vendor/lara/email/logo.webp",
        // 'mail.email.banner' => "https://example.com/external-image.webp",

        // Hide
        // 'mail.email.logo' => null,
        // 'mail.email.banner' => null,
        // 'mail.email.browser' => null,

        // Email titles
        // 'mail.email.products.title' => 'Fresh promotions',
        // 'mail.email.events.title' => 'Upcoming live events',
        // 'mail.email.info.title' => 'Looking for more?',

        // Footer urls
        // 'mail.email.footer.unsubscribe' => 'https://example.com/unsubscribe',
        // 'mail.email.footer.policy' => 'https://example.com/policy',
        // 'mail.email.footer.settings' => 'https://example.com/settings',
    ]);

    return (new MailMessage())
        // ->error()
        // ->success()
        // ->salutation('Best regards from our team')
        ->subject('Events notification')
        ->greeting('Space Invaders Game: Premiere')
        ->line('The introduction to the notification. Bold <strong>html tekst</strong> goes here. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos eum ex, atque, porro debitis cumque praesentium, dolore illo ullam nemo doloremque at nobis?')
        ->action('Notification Action', url('/'))
        ->line('Thank you for using our application, <a href="example.com" target="_blank">very nice!</a>')
        ->theme('lara::theme.default')
        ->markdown('lara::email.default', [
            // Comment to hide
            'code' => '888777',
            'date' => 'March 28, 4PM CET',
            // 'info' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos eum ex, atque, porro debitis cumque praesentium, dolore illo ullam nemo doloremque at nobis? Nesciunt neque molestias expedita eius voluptate saepe.',
            // 'products' => $products,
            // 'events' => $events,
        ]);
}
```

## Publish For Edit (optional)

```sh
php artisan vendor:publish --tag=lara-views --force
php artisan vendor:publish --tag=lara-config --force
php artisan vendor:publish --tag=lara-images --force
```

## Lara Email Theme

<img src="https://raw.githubusercontent.com/atomjoy/lara/main/lara-email.webp" width="100%">

### Width to 640px

<img src="https://raw.githubusercontent.com/atomjoy/lara/main/lara-email-rwd-640.webp" width="100%">

### Width to 520px

<img src="https://raw.githubusercontent.com/atomjoy/lara/main/lara-email-rwd-520.webp" width="100%">
