<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schedules = Schedule::all();
        return view('dashboard.schedules.index')->with('schedules', $schedules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.schedules.create');
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
        $schedule = new Schedule();
        $schedule->name = $request->name;
        $schedule->happens_at = $request->happens_at;
        $schedule->completed = false;
        $schedule->add_info = $request->add_info;
        $schedule->user_id = \auth()->user()->id;

        $schedule->save();

        return \redirect()->route('dashboard.schedules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
        return view('dashboard.schedules.show')->with('schedule', $schedule);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
        return view('dashboard.schedules.edit')->with('schedule', $schedule);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
        $schedule->name = $request->name;
        $schedule->happens_at = $request->happens_at;
        $schedule->completed = $request->completed;
        $schedule->add_info = $request->add_info;

        $schedule->save();

        return \redirect()->route('dashboard.schedules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
        $schedule->delete();

        return \redirect()->route('dashboard.schedules.index');
    }
}
