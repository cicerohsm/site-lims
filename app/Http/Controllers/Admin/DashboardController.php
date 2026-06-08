<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Post;
use App\Models\Publication;
use App\Models\TeamMember;
use App\Models\Technology;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $stats = [
            'posts' => Post::count(),
            'publications' => Publication::count(),
            'events' => Event::count(),
            'team_members' => TeamMember::count(),
            'technologies' => Technology::count(),
            'registrations' => EventRegistration::count(),
            'pending_registrations' => EventRegistration::where('status', 'pending')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
