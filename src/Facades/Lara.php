<?php

namespace Lara\Facades;

use Illuminate\Support\Facades\Facade;

class Lara extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'lara';
	}
}
