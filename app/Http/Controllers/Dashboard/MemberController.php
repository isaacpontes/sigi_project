<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Member;
use App\Congregation;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = Member::all();
        return view('dashboard.members.index')->with('members', $members);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $congregations = Congregation::where('church_id', auth()->user()->church_id)->pluck('name', 'id');
        return view('dashboard.members.create')->with('congregations', $congregations);

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
        $member = new Member();
        $member->name = $request->name;
        $member->gender = $request->gender;
        $member->birth = $request->birth;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->cpf = $request->cpf;
        $member->ocupation = $request->ocupation;
        $member->status = $request->status;
        $member->admission = $request->admission;
        $member->admission_date = $request->admission_date;
        $member->baptism_date = $request->baptism_date;
        $member->congregation_id = $request->congregation;
        $member->church_id = auth()->user()->church_id;

        $member->save();

        return redirect()->route('dashboard.members.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
