<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::oldest('start_date')
            ->get()
            ->map->only('id', 'title', 'start_date');

        return View::component('Events', ['events' => $events]);
    }

    public function create()
    {
        return View::component('CreateEvent');
    }

    public function store()
    {
        Event::create(
            Request::only('title', 'start_date', 'description')
        );
    }

    public function show(Event $event)
    {
        return View::component('Event', [
            'event' => $event->only('id', 'title', 'start_date', 'description'),
        ]);
    }

    public function edit(Event $event)
    {
        return View::component('EditEvent', [
            'event' => $event->only('id', 'title', 'start_date', 'description'),
        ]);
    }

    public function update(Event $event)
    {
        $event->update(Request::only('title', 'start_date', 'description'));
    }

    public function destroy(Event $event)
    {
        $event->delete();
    }
}
