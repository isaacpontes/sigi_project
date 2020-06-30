<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the classrooms.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classrooms = Classroom::all();
        return view('dashboard.classrooms.index')->with([
            'classrooms' => $classrooms
        ]);
    }

    /**
     * Show the form for creating a new classroom.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.classrooms.create');
    }

    /**
     * Store a newly created classroom in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $classroom = new Classroom();
        $classroom->name = $request->name;
        $classroom->add_info = $request->add_info;
        $classroom->church_id = auth()->user()->church_id;

        $classroom->save();

        return redirect()->route('dashboard.classrooms.index');
    }

    /**
     * Display the specified classroom.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
        return view('dashboard.classrooms.show')->with([
            'classroom' => $classroom
        ]);
    }

    /**
     * Show the form for editing the specified classroom.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
        return view('dashboard.classrooms.edit')->with([
            'classroom' => $classroom
        ]);
    }

    /**
     * Update the specified classroom in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        //
        $classroom->name = $request->name;
        $classroom->add_info = $request->add_info;

        $classroom->save();

        return redirect()->route('dashboard.classrooms.index');
    }

    /**
     * Remove the specified classroom from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        //
        $classroom->delete();

        return redirect()->route('dashboard.classrooms.index');
    }
}
