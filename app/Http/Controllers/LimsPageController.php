<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class LimsPageController extends Controller
{
    public function about(): View
    {
        return $this->renderPage('pages.about', 'about', 'group');
    }

    public function projects(): View
    {
        return $this->renderPage('pages.projects', 'projects', 'lims-red');
    }

    public function events(): View
    {
        return $this->renderPage('pages.events', 'events', 'lims-green');
    }

    public function team(): View
    {
        return $this->renderPage('pages.team', 'team', 'group');
    }

    public function technologies(): View
    {
        return $this->renderPage('pages.technologies', 'technologies', 'lims-red');
    }

    public function blog(): View
    {
        return $this->renderPage('pages.blog', 'blog', 'lims-green');
    }
}
