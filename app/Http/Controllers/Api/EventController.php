<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return response()->json(Event::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'event_date' => 'required|date'
        ]);

        $event = Event::create($validated);

        return response()->json($event, 201);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return response()->json($event);
    }

    public function join($id)
    {
        $event = Event::findOrFail($id);
        $requestUser = auth()->user();

        $requestUser->events()->syncWithoutDetaching($event->id);

        return response()->json([
            'message' => 'Berhasil join event'
        ]);
    }
}
