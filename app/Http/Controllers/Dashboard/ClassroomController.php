<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Classroom;
use Barryvdh\DomPDF\Facade\Pdf as DomPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    private $rules = [
        'name' => 'required|string',
        'add_info' => 'string'
    ];

    /**
     * Display a listing of the classrooms.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = DB::table('classrooms')
            ->where('church_id', auth()->user()->church_id)
            ->select(['id', 'name'])
            ->paginate(10);

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
        try {
            $request->validate($this->rules);

            $classroom = new Classroom();
            $classroom->name = $request->name;
            $classroom->add_info = $request->add_info;
            $classroom->church_id = auth()->user()->church_id;
            $classroom->save();

            return redirect()->route('dashboard.membership.classrooms.index')->with([
                'status' => 'Classe salva com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao salvar classe.',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified classroom.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        $active_members = $classroom->getActiveMembers();

        return view('dashboard.classrooms.show')->with([
            'classroom' => $classroom,
            'active_members' => $active_members
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
        try {
            $request->validate($this->rules);
            $classroom->update([
                'name' => $request->name,
                'add_info' => $request->add_info
            ]);
            return redirect()->route('dashboard.membership.classrooms.index')->with([
                'status' => 'Classe atualizada com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao atualizar classe.',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified classroom from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        try {
            $classroom->delete();

            return redirect()->route('dashboard.membership.classrooms.index')->with([
                'status' => 'Classe excluída com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao excluir classe.',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function exportPdfList()
    {
        $classrooms = DB::table('classrooms')
            ->where('church_id', auth()->user()->church_id)
            ->orderBy('created_at')
            ->get(['name', 'add_info']);

        $pdf = DomPdf::loadView('dashboard.classrooms.pdf-list', compact('classrooms'));

        return $pdf->download('lista-de-classes.pdf');
    }
}
