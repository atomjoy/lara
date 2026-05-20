<?php

namespace Lara\Actions;

use App\Models\Newsletter;
use App\Models\Subscriber;

/**
 * Newsletter tracking image
 *
 * Image src route url: '/track/email/views/{newsletter}/{subscriber}'
 */
class TrackViewsImage
{
    /**
     * Display image
     *
     * @return mixed Response or null
     */
    function handle(Newsletter $newsletter, Subscriber $subscriber, $path = 'default/email/tracking.png')
    {
        try {
            $newsletter->views++;
            $newsletter->save();

            // Log database subscriber activity here as needed.

            return response(file_get_contents(public_path($path)))
                ->header('Content-Type', 'image/png')
                ->header('Cache-Control', 'public, max-age=600');
        } catch (\Throwable $e) {
            return null;
        }
    }
}
