<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    private $rules = [
        'name' => 'required',
        'happens_at' => 'required|date_format:Y-m-d\TH:i',
        'completed' => 'boolean',
        'add_info' => 'string'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::query()
            ->where('user_id', auth()->user()->church_id)
            ->orderByDesc('happens_at')
            ->get(['id', 'name', 'happens_at', 'completed']);

        return view('dashboard.appointments.index')->with('appointments', $appointments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        try {
            $request->validate($this->rules);

            $appointment = new Appointment();
            $appointment->name = $request->name;
            $appointment->happens_at = $request->happens_at;
            $appointment->completed = false;
            $appointment->add_info = $request->add_info;
            $appointment->user_id = \auth()->user()->id;
            $appointment->save();

            return \redirect()->route('dashboard.appointments.index')->with([
                'status' => 'Compromisso criado com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao salvar compromisso.',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
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
        try {
            $request->validate($this->rules);
            $completed = $request->completed === "1" ? true : false;
            $appointment->update([
                'name' => $request->name,
                'happens_at' => $request->happens_at,
                'completed' => $completed,
                'add_info' => $request->add_info
            ]);

            return \redirect()->route('dashboard.appointments.index')->with([
                'status' => 'Compromisso atualizado com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao atualizar compromisso.',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        try {
            $appointment->delete();
            return \redirect()->route('dashboard.appointments.index')->with([
                'status' => 'Compromisso excluído com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao excluir compromisso.',
                'message' => $th->getMessage()
            ]);
        }
    }
}
