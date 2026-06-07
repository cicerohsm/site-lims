<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

abstract class Controller
{
    protected function renderPage(string $view, string $pageKey, string $themeKey = 'group', array $data = []): View
    {
        return view($view, array_merge([
            'meta' => config("site.meta.{$pageKey}", config('site.meta.home')),
            'pageKey' => $pageKey,
            'themeKey' => $themeKey,
        ], $data));
    }
}
