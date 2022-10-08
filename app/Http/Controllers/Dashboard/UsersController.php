<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('manageChurchUsers')) {
            return redirect()->route('dashboard.start')->with('error', 'Você não está autorizado a utilizar este recurso.');
        }
        $users = DB::table('users')
            ->where('church_id', Auth::user()->church_id)
            ->simplePaginate(10);
        return view('dashboard.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Authorization Gate
        if (Gate::denies('manageChurchUsers')) {
            return redirect()->route('dashboard.start')->with('error', 'Você não está autorizado a utilizar este recurso.');
        }
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Authorization Gate
        if (Gate::denies('manageChurchUsers')) {
            return redirect()->route('dashboard.start')->with('error', 'Você não está autorizado a utilizar este recurso.');
        }

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8',
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'system_admin' => false,
                'church_admin' => $request->church_admin ? true : false,
                'finances_admin' => $request->finances_admin ? true : false,
                'members_admin' => $request->members_admin ? true : false,
                'church_id' => Auth::user()->church_id,
            ]);

            event(new Registered($user));

            return redirect()->route('dashboard.users.index')->with('status', 'Usuário criado com sucesso!');

        } catch (\Throwable $th) {
            return redirect()->route('dashboard.users.create')->with('status', 'Não foi possível salvar as informações. Erro interno do servidor.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // Authorization Gate
        if (Gate::denies('manageUser', $user)) {
            return redirect()->route('dashboard.start')->with('error', 'Você não está autorizado a utilizar este recurso.');
        }
        return view('dashboard.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // Authorization Gate
        if (Gate::denies('manageChurchUsers', $user)) {
            return redirect()->route('dashboard.start')->with('error', 'Você não está autorizado a utilizar este recurso.');
        }
        return view('dashboard.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Authorization Gate
        if (Gate::denies('manageChurchUsers', $user)) {
            return redirect()->route('dashboard.start')->with('error', 'Você não está autorizado a utilizar este recurso.');
        }

        try {
            $request->validate([
                'name' => 'string|max:255',
                'email' => 'string|email|max:255|unique:users,email,' . $user->id,
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'church_admin' => $request->church_admin ? true : false,
                'finances_admin' => $request->finances_admin ? true : false,
                'members_admin' => $request->members_admin ? true : false,
            ]);

            return redirect()->route('dashboard.users.index')->with('status', 'Informações do usuário atualizadas com sucesso!');

        } catch (\Throwable $th) {
            return redirect()->route('dashboard.users.edit', $user)->with('status', 'Não foi possível salvar as informações. Erro interno do servidor.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateInfo(Request $request, User $user)
    {
        // Authorization Gate
        if (Gate::denies('manageUser', $user)) {
            return redirect()->route('dashboard.start')->with('error', 'Você não está autorizado a utilizar este recurso.');
        }

        try {
            $request->validate([
                'name' => 'string|max:255',
                'email' => 'string|email|max:255|unique:users,email,' . $user->id,
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect()->route('dashboard.users.show', $user)->with('status', 'Perfil atualizado com sucesso!');

        } catch (\Throwable $th) {
            return redirect()->route('dashboard.users.edit', $user)->with('status', 'Não foi possível salvar as informações. Erro interno do servidor.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, User $user)
    {
        // Authorization Gate
        if (Gate::denies('manageUser', $user)) {
            return redirect()->route('dashboard.start')->with('error', 'Você não está autorizado a utilizar este recurso.');
        }

        try {
            $request->validate([
                'current_password' => 'required|string|password',
                'password' => 'required|string|confirmed|min:8',
            ]);
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('dashboard.users.show', $user)->with('status', 'Senha atualizada com sucesso!');

        } catch (\Throwable $th) {
            return redirect()->route('dashboard.users.edit', $user)->with('status', 'Não foi possível atualizar a senha. Erro interno do servidor.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // Authorization Gate
        if (Gate::denies('manageChurchUsers')) {
            return redirect()->route('dashboard.start')->with('error', 'Você não está autorizado a utilizar este recurso.');
        }
        try {
            $user->delete();
            return redirect()->route('dashboard.users.index')->with('status', 'Usuário excluído com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.users.index')->with('status', 'Não foi possível excluir o usuário. Erro interno do servidor.');
        }
    }
}
