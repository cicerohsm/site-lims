<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Events\CreateEvent;
use App\Actions\Events\DeleteEvent;
use App\Actions\Events\UpdateEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Repositories\Contracts\EventRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function __construct(private readonly EventRepositoryInterface $repository) {}

    public function index()
    {
        $events = $this->repository->paginateAll(20);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(StoreEventRequest $request, CreateEvent $action)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $action->handle($data);
        return redirect()->route('admin.events.index')->with('success', 'Evento criado com sucesso.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(StoreEventRequest $request, Event $event, UpdateEvent $action)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $action->handle($event, $data);
        return redirect()->route('admin.events.index')->with('success', 'Evento atualizado.');
    }

    public function destroy(Event $event, DeleteEvent $action)
    {
        $action->handle($event);
        return redirect()->route('admin.events.index')->with('success', 'Evento excluído.');
    }
}
