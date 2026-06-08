<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\Technology;
use App\Repositories\Contracts\EventRepositoryInterface;
use Illuminate\Contracts\View\View;

class LimsPageController extends Controller
{
    public function __construct(private readonly EventRepositoryInterface $events) {}

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
        $events = $this->events->paginate(12);
        $highlightEvent = $this->events->latestPublished();

        return $this->renderPage('pages.events', 'events', 'lims-green', compact('events', 'highlightEvent'));
    }

    public function team(): View
    {
        $team = TeamMember::active()
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return $this->renderPage('pages.team', 'team', 'group', compact('team'));
    }

    public function technologies(): View
    {
        $technologies = Technology::active()
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        return $this->renderPage('pages.technologies', 'technologies', 'lims-red', compact('technologies'));
    }

    public function blog(): View
    {
        return $this->renderPage('pages.blog', 'blog', 'lims-green');
    }
}
