<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $appointments = Appointment::where('user_id', auth()->user()->id)->get();
        return view('dashboard.appointments.index')->with('appointments', $appointments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.appointments.create');
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
        $appointment = new Appointment();
        $appointment->name = $request->name;
        $appointment->happens_at = $request->happens_at;
        $appointment->completed = false;
        $appointment->add_info = $request->add_info;
        $appointment->user_id = \auth()->user()->id;

        $appointment->save();

        return \redirect()->route('dashboard.appointments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
        return view('dashboard.appointments.show')->with('appointment', $appointment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
        return view('dashboard.appointments.edit')->with('appointment', $appointment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
        // $request->completed ? dd($request) : dd('false');
        $appointment->name = $request->name;
        $appointment->happens_at = $request->happens_at;
        $appointment->completed = $request->completed;
        $appointment->add_info = $request->add_info;

        $appointment->save();

        return \redirect()->route('dashboard.appointments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
        $appointment->delete();

        return \redirect()->route('dashboard.appointments.index');
    }
}
