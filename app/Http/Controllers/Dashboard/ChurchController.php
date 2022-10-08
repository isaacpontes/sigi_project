<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Church;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ChurchController extends Controller
{
    /**
     * Exibe a igreja do usuário.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $church = Church::find(Auth::user()->church_id);
        // Authorization Gate
        if (Gate::denies('manageChurch', $church)) {
            return redirect()->route('dashboard.start')->with('error', 'Você não está autorizado a utilizar este recurso.');
        }
        return view('dashboard.churches.show')->with('church', $church);
    }

    /**
     * Atualiza a igreja do usuário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $church = Church::find(Auth::user()->church_id);
        // Authorization Gate
        if (Gate::denies('manageChurch', $church)) {
            return redirect()->route('dashboard.start')->with('error', 'Você não está autorizado a utilizar este recurso.');
        }

        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string'
            ]);
            $church->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone
            ]);
            return redirect()->route('dashboard.church.show')->with([
                'status' => 'Informações da igreja atualizadas com sucesso!',
            ]);
        } catch (\Throwable $th) {
            return  redirect()->route('dashboard.church.show')->with([
                'error' => 'Não foi possível salvar as informações. Erro interno do servidor.',
                'message' => $th->getMessage()
            ]);
        }
    }
}
