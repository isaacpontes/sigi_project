<?php

namespace App\Helpers;

use Illuminate\Support\Collection;

class MembershipHelper
{
    public static function filterDemotedMembersByYear(Collection $members, string $year)
    {
        $demoted_members = $members->filter(function ($member) use ($year) {
            $demission_year = date("Y", strtotime($member->demission));
            return $year === $demission_year;
        });

        return $demoted_members;
    }
}