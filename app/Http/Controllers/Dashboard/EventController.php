<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private $rules = [
        'name' => 'required',
        'description' => 'required',
        'happens_at' => 'required|date'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::query()
            ->where('church_id', auth()->user()->church_id)
            ->orderByDesc('happens_at')
            ->get(['id', 'name', 'happens_at']);

        return view('dashboard.events.index')->with([
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate($this->rules);
            $event = new Event();
            $event->name = $request->name;
            $event->description = $request->description;
            $event->happens_at = $request->happens_at;
            $event->church_id = \auth()->user()->church_id;

            $event->save();

            return \redirect()->route('dashboard.membership.events.index')->with([
                'status' => 'Evento criado com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao criar evento.',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('dashboard.events.show')->with([
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('dashboard.events.edit')->with([
            'event' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        try {
            $request->validate($this->rules);
            $event->update([
                'name' => $request->name,
                'description' => $request->description,
                'happens_at' => $request->happens_at
            ]);

            return redirect()->route('dashboard.membership.events.index')->with([
                'status' => 'Evento atualizado com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao atualizar evento.',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        try {
            $event->delete();

            return redirect()->route('dashboard.membership.events.index')->with([
                'status' => 'Evento excluído com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao excluir evento.',
                'message' => $th->getMessage()
            ]);
        }
    }
}
