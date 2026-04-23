<?php

namespace Lara;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Lara\Events\LaraEvent;
use Lara\Listeners\LaraNotification;

class LaraEventServiceProvider extends ServiceProvider
{
	protected $listen = [
		LaraEvent::class => [
			LaraNotification::class,
		],
	];

	/**
	 * Register any events for your application.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();
	}
}
