<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return $this->renderPage('pages.contact', 'contact', 'group');
    }
}
