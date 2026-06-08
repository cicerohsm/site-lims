<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTechnologyRequest;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::orderBy('sort_order')
            ->orderBy('title')
            ->paginate(20);

        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        return view('admin.technologies.create');
    }

    public function store(StoreTechnologyRequest $request)
    {
        Technology::create($this->prepareData($request));

        return redirect()->route('admin.technologies.index')->with('success', 'Frente tecnológica criada com sucesso.');
    }

    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    public function update(StoreTechnologyRequest $request, Technology $technology)
    {
        $technology->update($this->prepareData($request));

        return redirect()->route('admin.technologies.index')->with('success', 'Frente tecnológica atualizada.');
    }

    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index')->with('success', 'Frente tecnológica excluída.');
    }

    private function prepareData(StoreTechnologyRequest $request): array
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
