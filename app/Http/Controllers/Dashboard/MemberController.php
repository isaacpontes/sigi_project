<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Member;
use App\Congregation;
use App\Classroom;
use Barryvdh\DomPDF\Facade as DomPDF;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the members.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $members = Member::where('church_id', auth()->user()->church_id)->paginate(10);
        $active_members = Member::where('church_id', auth()->user()->church_id)
            ->whereNull('demission')
            ->orderBy('name', 'asc')
            ->paginate(10);
        $inactive_members = DB::table('members')
            ->where('church_id', auth()->user()->church_id)
            ->whereNotNull('demission')
            ->orderBy('name', 'asc')
            ->paginate(10);

        $current_year = date("Y");

        $active_members_this_year = DB::table('members')
            ->where('church_id', auth()->user()->church_id)
            ->whereNull('demission')
            ->whereYear('admission', '=', $current_year)
            ->count('id');

        $inactive_members_this_year = DB::table('members')
            ->where('church_id', auth()->user()->church_id)
            ->whereNotNull('demission')
            ->whereYear('demission', '=', $current_year)
            ->count('id');

        return view('dashboard.members.index', [
            'active_members' => $active_members,
            'inactive_members' => $inactive_members,
            'active_members_this_year' => $active_members_this_year,
            'inactive_members_this_year' => $inactive_members_this_year
        ]);
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
        // $member->delete();

        return redirect()->route('dashboard.members.index');
    }

    public function readmit(Member $member)
    {
        $now = new DateTime();
        $member->admission = $now->format("Y-m-d");
        $member->demission = null;
        $member->save();

        return redirect()->route('dashboard.members.index');
    }

    public function demit(Member $member)
    {
        $now = new DateTime();
        $member->demission = $now->format("Y-m-d");
        $member->save();

        return redirect()->route('dashboard.members.index');
    }

    public function simpleReport()
    {
        $active_members = Member::where('church_id', auth()->user()->church_id)
            ->whereNull('demission')
            ->orderBy('name', 'asc')
            ->get();
        $pdf = DomPDF::loadView('dashboard.members.simple-report', compact('active_members'));
        return $pdf->download('lista-de-membros.pdf');
    }

    public function inactivesReport()
    {
        $inactive_members = Member::where('church_id', auth()->user()->church_id)
            ->whereNotNull('demission')
            ->orderBy('name', 'asc')
            ->get();
        $pdf = DomPDF::loadView('dashboard.members.inactives-report', compact('inactive_members'));
        return $pdf->download('lista-de-membros-inativos.pdf');
    }

    public function anualReport()
    {
        $members = Member::where('church_id', auth()->user()->church_id)
            ->orderBy('name', 'asc')
            ->get();
        $current_year = date('Y');

        $active_members = $members->whereNull('demission');

        $new_members = $active_members->filter(function ($member) use ($current_year) {
            $admission_year = date('Y', strtotime($member->admission));
            return $admission_year === $current_year;
        });

        $inactive_members = $members->whereNotNull('demission');

        $new_inactive_members = $inactive_members->filter(function ($member) use ($current_year) {
            $demission_year = date('Y', strtotime($member->demission));
            return $demission_year === $current_year;
        });

        $pdf = DomPDF::loadView('dashboard.members.anual-report', compact([
            'current_year',
            'active_members',
            'new_members',
            'inactive_members',
            'new_inactive_members'
        ]));

        return $pdf->download('resumo-anual-de-membros.pdf');
    }

    public function customReport(Request $request)
    {
        $members = Member::where('church_id', auth()->user()->church_id)
            ->orderBy('name', 'asc')
            ->get();
        $initial_date = $request->initial_date;
        $final_date = $request->final_date;

        $active_members = $members->filter(function ($member) use ($final_date) {
            $admission = date('Y-m-d', strtotime($member->admission));
            return $admission <= $final_date && ($member->demission === null || $member->demission > $final_date);
        });

        $new_members = $active_members->filter(function ($member) use ($initial_date) {
            $admission = date('Y-m-d', strtotime($member->admission));
            return $admission >= $initial_date;
        });

        $inactive_members = $members->filter(function ($member) use ($final_date) {
            $member->demission ? $demission = date('Y-m-d', strtotime($member->demission)) : $demission = null;
            return $demission <= $final_date && $demission !== null;
        });

        $new_inactive_members = $inactive_members->filter(function ($member) use ($initial_date) {
            $demission = date('Y-m-d', strtotime($member->demission));
            return $demission >= $initial_date;
        });

        $pdf = DomPDF::loadView('dashboard.members.custom-report', compact([
            'initial_date',
            'final_date',
            'active_members',
            'new_members',
            'inactive_members',
            'new_inactive_members'
        ]));

        return $pdf->download('relatorio-de-membros-' . $initial_date . '-' . $final_date . '.pdf');
    }

    public function individualReport(Member $member)
    {
        $pdf = DomPDF::loadView('dashboard.members.individual-report', compact([
            'member',
        ]));

        return $pdf->download('relatorio-de-membro-' . $member->name . '.pdf');
    }
}
