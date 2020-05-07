<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Church;
use Gate;
use Illuminate\Http\Request;

class ChurchController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $churches = Church::all();
        return view('admin.churches.index')->with('churches', $churches);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Church $igreja)
    {
        // Authorization Gate
        // if(Gate::denies('')){
        //   return redirect(route('home'));
        // }

        return view('admin.churches.edit')->with([
          'church' => $igreja
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\HttpIgreja 2\Request  $request
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Church $igreja)
    {
        //
        $igreja->name = $request->name;
        $igreja->reg_name = $request->reg_name;
        $igreja->email = $request->email;
        $igreja->cnpj = $request->cnpj;
        $igreja->phone = $request->phone;
        

        $igreja->save();

        return redirect()->route('admin.churches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Church  $igreja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Church $igreja)
    {
        // Authorization Gate
        if(Gate::denies('manage-churches')){
          return redirect(route('home'));
        }

        $igreja->delete();

        return redirect()->route('admin.churches.index');
    }
}
