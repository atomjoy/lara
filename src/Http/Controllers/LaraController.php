<?php

namespace Lara\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class LaraController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json([
            'ip' => request()->ip()
        ]);

        // throw new \Exception('Not implemented');
    }
}
