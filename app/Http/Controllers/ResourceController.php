<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ResourceRepositoryInterface;

class ResourceController extends Controller
{
    public function __construct(private readonly ResourceRepositoryInterface $resources) {}

    public function index()
    {
        $type = request('type');
        $resources = $this->resources->paginate(12, $type, publicOnly: true);

        return $this->renderPage('pages.resources', 'resources', 'lims-red', compact('resources', 'type'));
    }
}
