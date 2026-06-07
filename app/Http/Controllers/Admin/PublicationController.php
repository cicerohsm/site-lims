<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Publications\CreatePublication;
use App\Actions\Publications\DeletePublication;
use App\Actions\Publications\UpdatePublication;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePublicationRequest;
use App\Models\Publication;
use App\Repositories\Contracts\PublicationRepositoryInterface;

class PublicationController extends Controller
{
    public function __construct(private readonly PublicationRepositoryInterface $repository) {}

    public function index()
    {
        $publications = $this->repository->paginate(20);
        return view('admin.publications.index', compact('publications'));
    }

    public function create()
    {
        return view('admin.publications.create');
    }

    public function store(StorePublicationRequest $request, CreatePublication $action)
    {
        $action->handle($request->validated());
        return redirect()->route('admin.publications.index')->with('success', 'Publicação criada com sucesso.');
    }

    public function edit(Publication $publication)
    {
        return view('admin.publications.edit', compact('publication'));
    }

    public function update(StorePublicationRequest $request, Publication $publication, UpdatePublication $action)
    {
        $action->handle($publication, $request->validated());
        return redirect()->route('admin.publications.index')->with('success', 'Publicação atualizada.');
    }

    public function destroy(Publication $publication, DeletePublication $action)
    {
        $action->handle($publication);
        return redirect()->route('admin.publications.index')->with('success', 'Publicação excluída.');
    }
}
