<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Resources\CreateResource;
use App\Actions\Resources\DeleteResource;
use App\Actions\Resources\UpdateResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResourceRequest;
use App\Models\Resource;
use App\Repositories\Contracts\ResourceRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function __construct(private readonly ResourceRepositoryInterface $repository) {}

    public function index()
    {
        $resources = $this->repository->paginate(20, publicOnly: false);
        return view('admin.resources.index', compact('resources'));
    }

    public function create()
    {
        return view('admin.resources.create');
    }

    public function store(StoreResourceRequest $request, CreateResource $action)
    {
        $data = $request->validated();

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('resources', 'public');
        }

        $action->handle($data);
        return redirect()->route('admin.resources.index')->with('success', 'Recurso criado com sucesso.');
    }

    public function edit(Resource $resource)
    {
        return view('admin.resources.edit', compact('resource'));
    }

    public function update(StoreResourceRequest $request, Resource $resource, UpdateResource $action)
    {
        $data = $request->validated();

        if ($request->hasFile('file')) {
            if ($resource->file_path) {
                Storage::disk('public')->delete($resource->file_path);
            }
            $data['file_path'] = $request->file('file')->store('resources', 'public');
        }

        $action->handle($resource, $data);
        return redirect()->route('admin.resources.index')->with('success', 'Recurso atualizado.');
    }

    public function destroy(Resource $resource, DeleteResource $action)
    {
        $action->handle($resource);
        return redirect()->route('admin.resources.index')->with('success', 'Recurso excluído.');
    }
}
