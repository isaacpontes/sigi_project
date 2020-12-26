<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Member;
use App\Congregation;
use App\Classroom;
use DomPDF;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the members.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = Member::where('church_id', auth()->user()->church_id)->get();
        return view('dashboard.members.index')->with('members', $members);
    }

    /**
     * Show the form for creating a new member.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $congregations = Congregation::where('church_id', auth()->user()->church_id)->pluck('name', 'id');
        $classrooms = Classroom::where('church_id', auth()->user()->church_id)->pluck('name', 'id');
        return view('dashboard.members.create')->with([
            'classrooms' => $classrooms,
            'congregations' => $congregations
        ]);

    }

    /**
     * Store a newly created member in storage.
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
        $member->admission = $request->admission;
        $member->classroom_id = $request->classroom_id;
        $member->congregation_id = $request->congregation_id;
        $member->church_id = auth()->user()->church_id;

        $member->save();

        return redirect()->route('dashboard.members.index');

    }

    /**
     * Display the specified member.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
        return view('dashboard.members.show')->with([
            'member' => $member
        ]);
    }

    /**
     * Show the form for editing the specified member.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
        $congregations = Congregation::where('church_id', auth()->user()->church_id)->pluck('name', 'id');
        $classrooms = Classroom::where('church_id', auth()->user()->church_id)->pluck('name', 'id');
        return view('dashboard.members.edit')->with([
            'member' => $member,
            'congregations' => $congregations,
            'classrooms' => $classrooms
        ]);
    }

    /**
     * Update the specified member in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
        $member->name = $request->name;
        $member->gender = $request->gender;
        $member->birth = $request->birth;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->admission = $request->admission;
        $member->demission = $request->demission;
        $member->classroom_id = $request->classroom_id;
        $member->congregation_id = $request->congregation_id;

        $member->save();

        return redirect()->route('dashboard.members.index');
    }

    /**
     * Remove the specified member from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
        $member->delete();

        return redirect()->route('dashboard.members.index');
    }

    public function pdf()
    {
        $members = Member::where('church_id', auth()->user()->church_id)->get();
        $pdf = DomPDF::loadView('dashboard.members.pdf', compact('members'));
        return $pdf->download('membros.pdf');
    }
}
