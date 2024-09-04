<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RanksAndRequirementsContoller extends Controller
{
    public function updateRank(Request $request)
    {
        $request->validate([
            'present_rank' => 'required|in:Rank 1,Rank 2,Rank 3,Rank 4,Rank 5,Senior Rank 1,Senior Rank 2,Senior Rank 3,Senior Rank 4,Senior Rank 5,Master Rank 1,Master Rank 2,Master Rank 3,Master Rank 4',
        ]);

        session(['present_rank' => $request->present_rank]);

        return back();
    }

    public function updateNextRank(Request $request)
    {
        $request->validate([
            'next_rank' => 'required|in:Rank 1,Rank 2,Rank 3,Rank 4,Rank 5,Senior Rank 1,Senior Rank 2,Senior Rank 3,Senior Rank 4,Senior Rank 5,Master Rank 1,Master Rank 2,Master Rank 3,Master Rank 4',
        ]);

        session(['next_rank' => $request->next_rank]);

        return back();
    }

    public function showRanks()
    {
        $ranks = ['Rank 1', 'Rank 2', 'Rank 3', 'Rank 4', 'Rank 5', 'Senior Rank 1', 'Senior Rank 2', 'Senior Rank 3', 'Senior Rank 4', 'Senior Rank 5', 'Master Rank 1', 'Master Rank 2', 'Master Rank 3', 'Master Rank 4'];
        $requirements = [
            'Rank 2' => [
                'Must have earned 25% of MA academic requirements on his/her specialization',
                'Must have a very good/very satisfactory efficiency rating',
                'At least three (3) years of teaching experience',
                'Must have met all the requirements of Teacher 1'
            ],
            'Rank 3' => [
                'Must have earned 75% of MA academic requirements on his/her specialization',
                'Must have a very good/very satisfactory efficiency rating',
                'At least three (3) years teaching experience',
                'Must have met all the requirements of Teacher 2'
            ],
            'Rank 4' => [
                'Must be a Masters Degree holder',
                'Must have a very good/very satisfactory efficiency rating',
                'At least three (3) years teaching experience',
                'Must have met all the requirements of Teacher 3'
            ],
            'Rank 5' => [
                'Must have a very good/very satisfactory efficiency rating',
                'Must have atleast 4 years teaching experience',
                'Must have earned atleast one (1) point of productive scholarship',
                'Must have met all the requirements of Teacher 4'
            ],
            'Senior Rank 1' => [
                'Must have a very good/very satisfactory efficiency rating',
                'Must have atleast 5 years teaching experience',
                'Must have earned atleast two (2) points of productive scholarship',
                'Must have met all the requirements of Teacher 5'
            ],
            'Senior Rank 2' => [
                'Must have a very good/very satisfactory efficiency rating',
                'Must have atleast 6 years teaching experience',
                'Must have earned atleast three (3) points of productive scholarship',
                'Must have met all the requirements of Senior Teacher 1'
            ],
            'Senior Rank 3' => [
                'Must have taken 25% of Doctoral academic requirements in his/her specialization',
                'Must have a very good/very satisfactory efficiency rating',
                'Must have atleast 7 years teaching experience',
                'Must have conducted at least one research approved/recognized by the administration',
                'Must have met all the requirements of Senior Teacher 2'
            ],
            'Senior Rank 4' => [
                'Must have taken 50% of Doctoral academic requirements in his/her specialization',
                'Must have a very good/very satisfactory efficiency rating',
                'Must have atleast 8 years teaching experience',
                'Must have shown consistent interest in conducting & publishing research or articles relevant to his/her field of specialization',
                'Must have met all the requirements of Senior Teacher 3'
            ],
            'Senior Rank 5' => [
                'Must have completed the academic requirements for Doctoral Degree',
                'Must have a very good/very satisfactory efficiency rating',
                'Must have atleast 9 years teaching experience',
                'Must exhibit continued interest in the conduct of researches, innovative and creative efforts',
                'Must have met all the requirements of Senior Teacher 4'
            ],
            'Master Rank 1' => [
                'Must be a Doctoral Degree holder',
                'Must have a very good/very satisfactory efficiency rating',
                'Must have atleast 10 years teaching experience',
                'Must have conducted atleast one (1) research work outside dissertation work and other articles consistent to education or field of specialization in a refereed journal',
                'Must have met all the requirements of Senior Teacher 5'
            ],
            'Master Rank 2' => [
                'Must have a very good/very satisfactory efficiency rating',
                'Must have atleast 11 years teaching experience',
                'Must have shown consistent interest in the conduct of researches, and other articles consistent to education or field of specialization in a refereed journal',
                'Must have met all the requirements of Master Teacher 1'
            ],
            'Master Rank 3' => [
                'Must have a very good/very satisfactory efficiency rating',
                'Must have atleast 12 years teaching experience',
                'Must have earned general recognition among scholars and educators',
                'Must have published books, articles in recognized journal or similar scholarships',
                'Must have participated in the activities of the learned societies',
                'Must have met all the requirements of Master Teacher 2'
            ],
            'Master Rank 4' => [
                'Must have a very good/very satisfactory efficiency rating',
                'Must have atleast 13 years teaching experience',
                'Must have met all the requirements of Master Teacher 3'
            ],
        ];

        $presentRank = session('present_rank', '');
        $nextRank = session('next_rank', '');
        $currentRequirements = [];

        if ($presentRank && $nextRank) {
            $presentRankIndex = array_search($presentRank, $ranks);
            $nextRankIndex = array_search($nextRank, $ranks);
            
            if ($nextRankIndex === $presentRankIndex + 1) {
                $currentRequirements = $requirements[$nextRank] ?? [];
            }
        }

        return view('home', compact('ranks', 'requirements', 'presentRank', 'nextRank', 'currentRequirements'));
    }
}
