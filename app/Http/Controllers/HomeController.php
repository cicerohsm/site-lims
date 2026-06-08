<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\TeamMember;
use App\Models\Technology;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $featuredPublications = Publication::orderByDesc('year')
            ->orderBy('title')
            ->limit(4)
            ->get();

        $team = TeamMember::active()
            ->orderBy('sort_order')
            ->orderBy('name')
            ->limit(3)
            ->get();

        $technologies = Technology::active()
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        return $this->renderPage('pages.home', 'home', data: compact('featuredPublications', 'team', 'technologies'));
    }
}
