<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Church;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ChurchController extends Controller
{
    //
    /**
     * Exibe a lista de todas as igrejas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('manageChurches')) {
            return redirect(route('home'));
        } else {
            $churches = Church::all();
            return view('dashboard.churches.index')->with('churches', $churches);
        }
    }

    /**
     * Exibe o formulário para criação de uma nova igreja.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('manageChurches')) {
            return redirect(route('home'));
        } else {
            return view('dashboard.churches.create');
        }
    }

    /**
     * Guarda a nova igreja criada no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $church = new Church();
        $church->name = $request->name;
        $church->reg_name = $request->reg_name;
        $church->email = $request->email;
        $church->cnpj = $request->cnpj;
        $church->phone = $request->phone;
        $church->add_info = $request->add_info;

        $church->save();

        return redirect(route('dashboard.churches.index'));
    }

    /**
     * Exibe a igreja especificada.
     *
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function show(Church $church)
    {
        // Authorization Gate
        if (Gate::denies('selfChurch', $church)) {
            return redirect(route('home'));
        } else {
            return view('dashboard.churches.show')->with('church', $church);
        }
    }

    /**
     * Exibe o formulário para editar a igreja especificada.
     *
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function edit(Church $church)
    {
        // Authorization Gate
        if (Gate::denies('selfChurch', $church)) {
            return redirect(route('home'));
        } else {
            return view('dashboard.churches.edit')->with('church', $church);
        }
    }

    /**
     * Atualiza a igreja especificada no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Church $church)
    {
        $church->name = $request->name;
        $church->reg_name = $request->reg_name;
        $church->email = $request->email;
        $church->cnpj = $request->cnpj;
        $church->phone = $request->phone;
        $church->add_info = $request->add_info;

        $church->save();

        return redirect()->route('dashboard.churches.index');
    }

    /**
     * Remove a igreja especificada do armazenamento.
     *
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function destroy(Church $church)
    {
        // Authorization Gate
        if(Gate::denies('manageChurches')){
          return redirect(route('home'));
        } else {
            $church->delete();

            return redirect()->route('dashboard.churches.index')->with('status', 'Igreja excluida com sucesso.');
        }
    }
}
