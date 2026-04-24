<?php

namespace Lara\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Mail\Mailable;

class LaraNotificanion extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $events = null, public $products = null, public $info = null) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // Page url
        $host = app()->request->getSchemeAndHttpHost();
        $host = 'https://raw.githubusercontent.com/atomjoy/lara/refs/heads/main/public';

        // Lara config email template
        // Images always with https://
        config([
            // Show or change
            'mail.email.browser' => $host . "/email/123",
            // 'mail.email.link' => 'https://example.com',
            // 'mail.email.logo' =>  $host . "/email/logo.webp",
            // 'mail.email.banner' => "https://images.unsplash.com/photo-1556125574-d7f27ec36a06?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",

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

        // Sample data
        $img = 'https://picsum.photos/id/' . rand(1, 99) . '/300/200';
        $img1 = $host . '/email/events/1.webp';
        $img2 = $host . '/email/events/2.webp';
        $img3 = $host . '/email/events/3.webp';
        $img4 = $host . '/email/events/4.webp';
        $img5 = $host . '/email/events/5.webp';
        $img6 = $host . '/email/events/6.webp';

        $event1 = [
            'img' => $img1,
            'date' => 'October 11, 15:30 UTC',
            'title' => 'Lorem sit amet consectetur adipisicing elit.',
            'desc' => 'Lorem sit amet consectetur adipisicing elit. Natus sint incidunt nulla inventore? Rem sequi iure itaque non ut ipsa optio quisquam amet necessitatibus provident rerum, deleniti praesentium molestiae labore.',
            'url' => 'https://example.com',
            'button' => 'Order now',
            'price' => '$199.00'
        ];

        $event2 = [
            'img' => $img2,
            'date' => 'September 12, 20:30 UTC',
            'title' => 'Dit amet consectetur adipisicing elit.',
            'desc' => 'Natus sint incidunt nulla inventore? Rem sequi iure itaque non ut ipsa optio quisquam amet necessitatibus provident rerum, deleniti praesentium molestiae labore.',
            'url' => 'https://example.com',
            'button' => 'Save your seat',
        ];

        $event3 = [
            'img' => $img6,
            'date' => 'September 12, 13:30 UTC',
            'title' => 'Lorem sit amet consectetur adipisicing elit.',
            'desc' => 'Color sit amet consectetur adipisicing elit boste. Voluptates fugit, aliquam mollitia quidem voluptate nam ipsa eius? Et aspernatur ipsum esse aliquid maiores sunt repellendus tempore quasi, dicta est atque.',
            'url' => 'https://example.com/product/55',
            'button' => 'Buy now',
            'price' => '$69.99',
        ];

        $event4 = [
            'img' => $img4,
            'date' => 'September 13, 19:30 UTC',
            'title' => 'Wit amet consectetur adipisicing elit.',
            'desc' => 'Color sit amet consectetur adipisicing elit boste. Voluptates fugit, aliquam mollitia quidem voluptate nam ipsa eius? Et aspernatur ipsum esse aliquid maiores sunt repellendus tempore quasi, dicta est atque.',
            'url' => 'https://example.com/product/55',
            'button' => 'Buy now',
            'price' => '$69.99',
        ];

        $event5 = [
            'img' => $img3,
            'date' => 'September 14, 10:30 UTC',
            'title' => 'Adipisicing elit boste adipisicing elit.',
            'desc' => 'Color sit amet consectetur adipisicing elit boste. Voluptates fugit, aliquam mollitia quidem voluptate nam ipsa eius? Et aspernatur ipsum esse aliquid maiores sunt repellendus tempore quasi, dicta est atque.',
            'url' => 'https://example.com/product/55',
            'button' => 'Buy now',
            'price' => '$69.99',
        ];

        $events = [
            [$event1, $event2],
            [$event3],
            [$event4, $event5],
        ];

        $img1 = $host . '/email/products/1.webp';
        $img2 = $host . '/email/products/2.webp';
        $img3 = $host . '/email/products/3.webp';
        $img4 = $host . '/email/products/4.webp';
        $img5 = $host . '/email/products/6.webp';
        $img6 = $host . '/email/products/5.webp';

        $product1 = [
            'img' => $img1,
            'title' => 'Monitory',
            'line1' => 'Asus Rog',
            'line2' => 'RGB / Mat / 32cal',
            'line3' => 'Black, gold',
            'url' => 'https://example.com/product/55',
            'price' => '3595.99',
            'old_price' => '3899.99',
            'button' => 'zł',
        ];

        $product2 = [
            'img' => $img2,
            'title' => 'Płyta główna',
            'line1' => 'Gigabyte B650',
            'line2' => '64GB / 400W / AMD',
            'line3' => '4 x PCI',
            'url' => 'https://example.com/product/55',
            'price' => '3259.99',
            'old_price' => '3689.99',
            'button' => 'zł',
        ];

        $product3 = [
            'img' => $img3,
            'title' => 'Laptop',
            'line1' => 'Falcon Northwest',
            'line2' => '96GB / 15cal / 1kg ',
            'line3' => 'Black metal',
            'url' => 'https://example.com/product/55',
            'price' => '14999.00',
            'old_price' => '15956.00',
            'button' => 'zł',
        ];

        $product4 = [
            'img' => $img4,
            'title' => 'Laptop 15',
            'line1' => 'Apple iPad',
            'line2' => '32GB / 16MB / 1kg',
            'line3' => 'Mate black',
            'url' => 'https://example.com/product/55',
            'price' => '1559.99',
            'old_price' => '2089.00',
            'button' => 'zł',
        ];

        $product5 = [
            'img' => $img5,
            'title' => 'Karta graficzna',
            'line1' => 'RTX 5070',
            'line2' => '64GB / 150W / CUDA',
            'line3' => '4 monitory',
            'url' => 'https://example.com/product/55',
            'price' => '3259.99',
            'old_price' => '3689.00',
            'button' => 'zł',
        ];

        $product6 = [
            'img' => $img6,
            'title' => 'Telefon',
            'line1' => 'Samsung Galaxy',
            'line2' => '16GB / 20Mp / 7cm ',
            'line3' => 'Green Mate',
            'url' => 'https://example.com/product/55',
            'price' => '2559.99',
            'old_price' => '2989.00',
            'button' => 'zł',
        ];

        $products = [
            [$product1, $product2, $product3],
            [$product4, $product5, $product6],
        ];

        return (new MailMessage())
            // ->error()->success()
            // ->salutation('Best regards from our team')
            ->subject('Events notification')
            ->greeting('Space Invaders Game: Premiere')
            ->line('The introduction to the notification. Bold <strong>html tekst</strong> goes here. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos eum ex, atque, porro debitis cumque praesentium, dolore illo ullam nemo doloremque at nobis?')
            ->action('Notification Action', url('/confirm/email'))
            ->line('Thank you for using our application, <a href="https://example.com" target="_blank">very nice!</a>')
            ->theme('lara::theme.default')
            ->markdown('lara::email.default', [
                // Comment to hide
                'code' => '888777',
                'products' => $products,
                'events' => $events,
                'date' => 'March 28, 4PM CET',
                'info' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos eum ex, atque, porro debitis cumque praesentium, dolore illo ullam nemo doloremque at nobis? Nesciunt neque molestias expedita eius voluptate saepe.',
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
