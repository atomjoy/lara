# Lara Email Notification Theme in Laravel 13

Lara is a custom theme for HTML email notifications in Laravel 13.

## Install

```sh
composer create-project laravel/laravel:^13 test
cd test
composer require atomjoy/lara
```

### After Install

```sh
# Publish lara email images to public/vendor/lara and update logo and banner
php artisan vendor:publish --tag=lara-images --force
```

## Show Lara Email Theme

Lara email notification examples in **LaraNotificanion** class.

```php
<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;
use Lara\Notifications\LaraNotificanion;

// Set smtp settings in .env file
Route::get('/lara', function () {

    // Make user
    $user = User::factory()->make([
        'email' => 'your-email@example.com'
    ]);

    // Send notification email
    Notification::sendNow($user, new LaraNotificanion());

    // Show in browser
    return (new LaraNotificanion())->toMail($user);
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
    $page = app()->request->getSchemeAndHttpHost();
    // Demo image url
    $host = 'https://raw.githubusercontent.com/atomjoy/lara/refs/heads/main/public';

    // Lara config email template links and images always with https://
    config([
        // Show
            'mail.email.browser' => $page . "/email/123",

            // Change
            // 'mail.email.link' => 'https://example.com',
            // 'mail.email.logo' =>  $host . "/email/logo.webp",
            // 'mail.email.banner' => "https://images.unsplash.com/photo-1556125574-d7f27ec36a06?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",

            // Hide
            // 'mail.email.logo' => null,
            // 'mail.email.banner' => null,
            // 'mail.email.browser' => null,

            // Email title
            // 'mail.email.products.title' => 'Fresh promotions',
            // 'mail.email.events.title' => 'Upcoming live events',
            // 'mail.email.info.title' => 'Looking for more?',

            // Footer url
            // 'mail.email.footer.logo' => 'https://example.com/footer-logo.webp',
            // 'mail.email.footer.unsubscribe' => 'https://example.com/unsubscribe',
            // 'mail.email.footer.policy' => 'https://example.com/policy',
            // 'mail.email.footer.settings' => 'https://example.com/settings',

            // Show footer social icons
            'mail.email.social.instagram' => 'https://instagram.com/',
            'mail.email.social.facebook' => 'https://facebook.com/',
            'mail.email.social.youtube' => 'https://youtube.com/',
            'mail.email.social.tiktok' => 'https://tiktok.com/',
            'mail.email.social.x' => 'https://x.com/',
    ]);

    // ...

    // Defaut theme events, products
    return (new MailMessage())
        // ->error()->success()
        // ->salutation('Best regards from our team')
        ->subject('Events notification')
        ->greeting('Web Interaction in the Age of AI')
        ->line('The introduction to the notification. Bold <strong>html tekst</strong> goes here. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos eum ex, atque, porro debitis cumque praesentium, dolore illo ullam nemo doloremque at nobis?')
        ->action('Confirm Email Address', url('/confirm/email'))
        ->line('Thank you for using our application, <a href="https://example.com" target="_blank">very nice!</a>')
        // Set default or mini theme and markdown
        ->theme('lara::theme.default')
        ->markdown('lara::email.default', [
            // Comment to hide
            'date' => 'March 28, 4PM CET',
            'code' => '888777',
            'info' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos eum ex, atque, porro debitis cumque praesentium, dolore illo ullam nemo doloremque at nobis? Nesciunt neque molestias expedita eius voluptate saepe.',
            'products' => $products,
            'events' => $events,
            'news' => $news,
        ]);
}
```

## Publish Theme For Edit (optional)

```sh
# In resources/views/vendor/lara
php artisan vendor:publish --tag=lara-views --force
# In public/vendor/lara
php artisan vendor:publish --tag=lara-images --force
# In config/lara.php
php artisan vendor:publish --tag=lara-config --force

# Sample with provider package
php artisan vendor:publish --provider='Lara\LaraServiceProvider' --tag="images"
```

## Lara Email Theme

<img src="https://raw.githubusercontent.com/atomjoy/lara/main/lara-email.webp" width="100%">

### Width to 640px

<img src="https://raw.githubusercontent.com/atomjoy/lara/main/lara-email-rwd-640.webp" width="50%">

### Width to 520px

<img src="https://raw.githubusercontent.com/atomjoy/lara/main/lara-email-rwd-520.webp" width="50%">
