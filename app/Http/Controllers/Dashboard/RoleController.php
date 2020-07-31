<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('manageUsers')) {
            return redirect(route('home'));
        } else {
            $roles = Role::all();
            return view('dashboard.roles.index')->with('roles', $roles);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('manageUsers')) {
            return redirect(route('home'));
        } else {
            return view('dashboard.roles.create');
        }
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
        if (Gate::denies('manageUsers')) {
            return redirect(route('home'));
        } else {
            $role = new Role();
            $role->name = $request->name;
            $role->save();
            return redirect(route('dashboard.roles.index'));
        }
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Role  $role
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Role $role)
    // {
    //     // Authorization Gate
    //     if (Gate::denies('manageUser')) {
    //         return redirect(route('home'));
    //     } else {
    //         return view('dashboard.roles.show')->with('role', $role);
    //     }
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        // Authorization Gate
        if (Gate::denies('manageUsers')) {
            return redirect(route('home'));
        } else {
            return view('dashboard.roles.edit')->with('role', $role);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // Authorization Gate
        if (Gate::denies('manageUsers')) {
            return redirect(route('home'));
        } else {
            $role->name = $request->name;
            $role->save();
            return redirect(route('dashboard.roles.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // Authorization Gate
        if (Gate::denies('manageUsers')) {
            return redirect(route('home'));
        } else {
            $role->users()->detach();
            $role->delete();
            return redirect(route('dashboard.roles.index'));
        }
    }
}
