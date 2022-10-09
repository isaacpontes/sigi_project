<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Member;
use App\Helpers\MemberHelper;
use Barryvdh\DomPDF\Facade\Pdf as DomPdf;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use IntlDateFormatter;

class MemberController extends Controller
{
    private $rules = [
        'name' => 'required|string',
        'gender' => 'required|numeric',
        'birth' => 'required|date',
        'email' => 'required|email',
        'phone' => 'string',
        'address' => 'string',
        'admission' => 'required|date',
        'classroom_id' => 'string',
        'congregation_id' => 'required|string'
    ];

    private $member_helper;

    public function __construct()
    {
        $this->member_helper = new MemberHelper();
    }

    /**
     * Display a listing of the members.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_members = $this->member_helper->findAllActive(true, 10, ['id', 'name', 'phone', 'email']);

        $inactive_members = $this->member_helper->findAllInactive(true, 10, ['id', 'name', 'phone', 'email']);

        $current_year = date("Y");

        $admited_this_year = $this->member_helper->countAdmitedMembersByYear($current_year);

        $demited_this_year = $this->member_helper->countDemitedMembersByYear($current_year);

        return view('dashboard.members.index', [
            'active_members' => $active_members,
            'inactive_members' => $inactive_members,
            'active_members_this_year' => $admited_this_year,
            'inactive_members_this_year' => $demited_this_year
        ]);
    }

    /**
     * Show the form for creating a new member.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $congregations = DB::table('congregations')
            ->where('church_id', auth()->user()->church_id)
            ->pluck('name', 'id');
        $classrooms = DB::table('classrooms')
            ->where('church_id', auth()->user()->church_id)
            ->pluck('name', 'id');

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
        try {
            $request->validate($this->rules);

            $member = new Member();
            $member->name = $request->name;
            $member->gender = $request->gender; // Change to Enum
            $member->birth = $request->birth;
            $member->email = $request->email;
            $member->phone = $request->phone;
            $member->address = $request->address;
            $member->admission = $request->admission;
            $member->classroom_id = $request->classroom_id;
            $member->congregation_id = $request->congregation_id;
            $member->church_id = auth()->user()->church_id;
            $member->save();

            return redirect()->route('dashboard.membership.members.index')->with([
                'status' => 'Membro cadastrado com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao cadastrar membro.',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified member.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
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
        $congregations = DB::table('congregations')
            ->where('church_id', auth()->user()->church_id)
            ->pluck('name', 'id');

        $classrooms = DB::table('classrooms')
            ->where('church_id', auth()->user()->church_id)
            ->pluck('name', 'id');

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
        try {
            $request->validate($this->rules);
            $member->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'birth' => $request->birth,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'admission' => $request->admission,
                'demission' => $request->demission,
                'classroom_id' => $request->classroom_id === 'null' ? null : $request->classroom_id,
                'congregation_id' => $request->congregation_id
            ]);

            return redirect()->route('dashboard.membership.members.index')->with([
                'status' => 'Membro atualizado com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao atualizar membro.',
                'message' => $th->getMessage()
            ]);
        }
    }

    // /**
    //  * Remove the specified member from storage.
    //  *
    //  * @param  \App\Member  $member
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Member $member)
    // {
    //     $member->delete();

    //     return redirect()->route('dashboard.membership.members.index');
    // }

    public function readmit(Member $member)
    {
        $member->readmit();

        return redirect()->route('dashboard.membership.members.index');
    }

    public function demit(Member $member)
    {
        $member->demit();

        return redirect()->route('dashboard.membership.members.index');
    }

    public function simpleReport()
    {
        $active_members = $this->member_helper->findAllActiveWithCongregation();

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

        $date_dormatter = new IntlDateFormatter(
            'pt-BR',
            IntlDateFormatter::SHORT,
            IntlDateFormatter::NONE,
            'America/Sao_Paulo'
        );

        $pdf = DomPDF::loadView('dashboard.members.custom-report', [
            'initial_date' => $date_dormatter->format(new DateTime($initial_date)),
            'final_date' => $date_dormatter->format(new DateTime($final_date)),
            'active_members' => $active_members,
            'new_members' => $new_members,
            'inactive_members' => $inactive_members,
            'new_inactive_members' => $new_inactive_members
        ]);

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
