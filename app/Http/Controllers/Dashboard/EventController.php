<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Event;
use App\Member;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::where('church_id', auth()->user()->church_id)->get();
        return view('dashboard.events.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $members = Member::where('church_id', \auth()->user()->church_id)->pluck('name', 'id');
        return view('dashboard.events.create')->with('members', $members);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->happens_at = $request->happens_at;
        $event->member_id = $request->member_id;
        $event->church_id = \auth()->user()->church_id;

        $event->save();

        return \redirect()->route('dashboard.events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
        return view('dashboard.events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
        $members = Member::where('church_id', \auth()->user()->church_id)->pluck('name', 'id');
        return view('dashboard.events.edit')->with([
            'event' => $event,
            'members' => $members
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
        //
        $event->name = $request->name;
        $event->description = $request->description;
        $event->happens_at = $request->happens_at;
        $event->member_id = $request->member_id;

        $event->save();

        return \redirect()->route('dashboard.events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
        $event->delete();

        return \redirect()->route('dashboard.events.index');
    }
}
