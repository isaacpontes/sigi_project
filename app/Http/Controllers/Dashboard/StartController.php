<?php

namespace App\Http\Controllers\Dashboard;

use App\Account;
use App\Appointment;
use App\Congregation;
use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Http\Request;

class StartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the dashboard start page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = date('Y-m-d');

        $appointments = Appointment::query()
            ->where('user_id', auth()->id())
            ->whereDate('happens_at', '=', $today)
            ->latest('happens_at')
            ->get(['id']);

        $active_members = Member::query()
            ->where('church_id', auth()->user()->church_id)
            ->whereNull('demission')
            ->get(['id']);

        $accounts = Account::query()
            ->where('church_id', auth()->user()->church_id)
            ->get(['id']);

        $congregations = Congregation::query()
            ->where('church_id', auth()->user()->church_id)
            ->get(['id']);

        return view('dashboard.start', [
            'appointments' => $appointments,
            'congregations' => $congregations,
            'active_members' => $active_members,
            'accounts' => $accounts
        ]);
    }
}
