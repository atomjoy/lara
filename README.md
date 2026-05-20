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

## How To Use with Notifications

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

    // Track views image (return image content from url)
    // $trackingUrl = '/track/email/views/' . $this->newsletter->id . '/' . $this->notifiable->id;
    // config([
    //     'mail.email.tracking.image.url' => $trackingUrl
    // ]);

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
        ->action('Confirm Email Address', $page . '/confirm/email') // Dont use url() function
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

## How To Use with Mailable

```php
<?php

namespace App\Mail;

use App\Models\Newsletter;
use App\Models\Social;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(protected Newsletter $newsletter, protected Subscriber $subscriber)
    {
        $this->onQueue('email');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // from: new Address('example@example.com', 'Test Sender'),
            subject: $this->newsletter?->subject ?? '👀 Fresh Newsletter',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $page = app()->request->getSchemeAndHttpHost();

        // Track views
        $trackingUrl = '/track/email/views/' . $this->newsletter->id . '/' . $this->subscriber->id;
        config([
            'mail.email.tracking.image.url' => $trackingUrl
        ]);

        // Banner image
        if (isset($this->newsletter->image)) {
            config(['mail.email.banner' => $page . "/image/" . $this->newsletter->image]);
        } else {
            // Show default or uncoment to remove banner
            // config(['mail.email.banner' => null]);
        }

        foreach (Social::where('place', 'newsletter')->get() as $s) {
            config([
                'mail.email.social.' . strtolower($s->name) => $s->url ?? $page,
            ]);
        }

        $m = (new MailMessage)
            ->subject($this->newsletter->subject ?? __('👀 Fresh Newsletter'))
            ->greeting($this->replaceName($this->newsletter->title ?? __('👀 Fresh Newsletter')))
            ->lines($this->splitLines($this->newsletter->line1 ?? ''))
            ->action($this->newsletter->button ?? __('See More'), $this->newsletter->url ?? $page)
            ->lines($this->splitLines($this->newsletter->line2 ?? ''))
            ->theme('lara::theme.default')
            ->markdown('lara::email.default', [
                'code' => $this->newsletter->code ?? null,
                'date' => $this->newsletter->published_at->format('Y-m-d') ?? null,
                // Comment to hide
                // 'info' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
                // 'products' => $products,
                // 'events' => $events,
                // 'news' => $news,
            ])->render();

        return new Content(
            htmlString: $m,
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    /**
     * Replace mustache attribute {name}.
     *
     * @param string $str
     * @return string
     */
    public function replaceName(string $str): string
    {
        return str_ireplace('{name}', $this->subscriber->name, $str);
    }

    /**
     * Markdown multiple line format
     *
     * @param string $str
     * @return array
     */
    public function splitLines(string $str): array
    {
        return array_map(trim(...), preg_split('/\\r\\n|\\r|\\n/', $this->replaceName($str) ?? ''));
    }
}
```

## Cron

Send emails from queue (or remove: implements ShouldQueue).

```sh
# Cron
crontab -e

# Test every minute
* * * * * /usr/bin/php /path-to-your-project/artisan queue:work --queue=high,medium,email,default --max-time=60 --sleep=5 > /dev/null

# Hosting every 5 min
*/10 * * * * php84 /home/username/domains/example.com/artisan queue:work --queue=high,medium,email,default --max-time=600 --sleep=5 > /dev/null
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
