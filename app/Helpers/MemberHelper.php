<?php

namespace App\Helpers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MemberHelper
{
    public function findAllActive(
        $paginate = false,
        $perPage = 15,
        $columns = ['*'],
        $pageName = 'page',
        $page = null
    ): LengthAwarePaginator | Collection {
        $query = DB::table('members')
            ->where('church_id', auth()->user()->church_id)
            ->whereNull('demission')
            ->orderBy('name', 'asc');

        if ($paginate) {
            $active_members = $query->paginate($perPage, $columns, $pageName, $page);
        } else {
            $active_members = $query->get();
        }

        return $active_members;
    }

    public function findAllActiveWithCongregation()
    {
        $active_members = DB::table('members')
            ->where('members.church_id', auth()->user()->church_id)
            ->whereNull('demission')
            ->leftJoin('congregations', 'congregations.id', '=', 'members.congregation_id')
            ->orderBy('members.name', 'asc')
            ->get([
                'members.id',
                'members.name',
                'members.phone',
                'members.birth',
                'congregations.name AS congregation'
            ]);

        return $active_members;
    }

    public function findAllInactive(
        $paginate = false,
        $perPage = 15,
        $columns = ['*'],
        $pageName = 'page',
        $page = null
    ): LengthAwarePaginator | Collection {
        $query = DB::table('members')
            ->where('church_id', auth()->user()->church_id)
            ->whereNotNull('demission')
            ->orderBy('name', 'asc');

        if ($paginate) {
            $inactive_members = $query->paginate($perPage, $columns, $pageName, $page);
        } else {
            $inactive_members = $query->get();
        }

        return $inactive_members;
    }

    public function countAdmitedMembersByYear(string $year): int
    {
        $admited_members_count = DB::table('members')
            ->where('church_id', auth()->user()->church_id)
            ->whereNull('demission')
            ->whereYear('admission', '=', $year)
            ->count('id');

        return $admited_members_count;
    }

    public function countDemitedMembersByYear(string $year): int
    {
        $demited_members_count =  DB::table('members')
            ->where('church_id', auth()->user()->church_id)
            ->whereNotNull('demission')
            ->whereYear('demission', '=', $year)
            ->count('id');

        return $demited_members_count;
    }

    public function filterDemotedMembersByYear(Collection $members, string $year): Collection
    {
        $demoted_members = $members->filter(function ($member) use ($year) {
            $demission_year = date("Y", strtotime($member->demission));
            return $year === $demission_year;
        });

        return $demoted_members;
    }
}
