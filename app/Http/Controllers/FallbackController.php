<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class FallbackController extends Controller
{
    public function __invoke(): Response
    {
        return response()->view('errors.404', [], 404);
    }
}
