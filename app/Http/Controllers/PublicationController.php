<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\PublicationRepositoryInterface;

class PublicationController extends Controller
{
    public function __construct(private readonly PublicationRepositoryInterface $publications) {}

    public function index()
    {
        $type = request('type');
        $year = request('year') ? (int) request('year') : null;
        $publications = $this->publications->paginate(15, $type, $year);

        return $this->renderPage('pages.publications', 'publications', 'lims-blue', compact('publications', 'type', 'year'));
    }
}
