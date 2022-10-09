<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Congregation;
use Barryvdh\DomPDF\Facade\Pdf as DomPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class CongregationController extends Controller
{
    private $rules = [
        'name' => 'required|string',
        'phone' => 'required|string',
        'address' => 'required|string'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $congregations = DB::table('congregations')
            ->where('church_id', auth()->user()->church_id)
            ->select(['id', 'name', 'phone'])
            ->paginate(10);

        return view('dashboard.congregations.index')->with('congregations', $congregations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.congregations.create');
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

            $congregation = new Congregation();
            $congregation->name = $request->name;
            $congregation->phone = $request->phone;
            $congregation->address = $request->address;
            $congregation->add_info = $request->add_info;
            $congregation->church_id = auth()->user()->church_id;
            $congregation->save();

            return redirect()->route('dashboard.congregations.index')->with([
                'status' => 'Congregação salva com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao salvar congregação.',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Congregation  $congregation
     * @return \Illuminate\Http\Response
     */
    public function show(Congregation $congregation)
    {
        $active_members = $congregation->getActiveMembers();

        return view('dashboard.congregations.show')->with([
            'congregation' => $congregation,
            'active_members' => $active_members
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Congregation  $congregation
     * @return \Illuminate\Http\Response
     */
    public function edit(Congregation $congregation)
    {
        return view('dashboard.congregations.edit')->with([
            'congregation' => $congregation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Congregation  $congregation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Congregation $congregation)
    {
        try {
            $request->validate($this->rules);
            $congregation->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'add_info' => $request->add_info
            ]);

            return redirect()->route('dashboard.congregations.index')->with([
                'status' => 'Congregação atualizada com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao atualizar congregação.',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Congregation  $congregation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Congregation $congregation)
    {
        try {
            $congregation->delete();

            return redirect()->route('dashboard.congregations.index')->with([
                'status' => 'Congregação excluída com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao excluir congregação.',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function exportPdfList()
    {
        $congregations = DB::table('congregations')
            ->where('church_id', auth()->user()->church_id)
            ->orderBy('created_at')
            ->get(['name', 'phone', 'address']);
        $pdf = DomPdf::loadView('dashboard.congregations.pdf-list', compact('congregations'));

        return $pdf->download('lista-de-congregacoes.pdf');
    }
}
