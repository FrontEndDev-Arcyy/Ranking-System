<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HonorsAwardsController extends Controller
{
    public function index()
    {
        $honorsAwards = session('honors_awards', []);
        $ranks = ['Rank 1', 'Rank 2', 'Rank 3', 'Rank 4', 'Rank 5', 'Senior Rank 1', 'Senior Rank 2', 'Senior Rank 3', 'Senior Rank 4', 'Senior Rank 5', 'Master Rank 1', 'Master Rank 2', 'Master Rank 3', 'Master Rank 4'];
        $presentRank = session('present_rank', '');
        $nextRank = session('next_rank', '');
        $currentRequirements = [];

        return view('home', compact('honorsAwards', 'ranks', 'presentRank', 'nextRank', 'currentRequirements'));
    }

    public function store(Request $request)
    {
        $honorsAwards = session('honors_awards', []);
        $newEntry = [
            'documents' => $request->input('documents'),
            'title' => $request->input('title'),
            'sponsor' => $request->input('sponsor'),
            'points' => $request->input('points'),
        ];
        $honorsAwards[] = $newEntry;
        session(['honors_awards' => $honorsAwards]);

        return redirect()->route('home')->with('success', 'New entry added successfully.');
    }

    public function destroy($index)
    {
        $honorsAwards = session('honors_awards', []);
        if (isset($honorsAwards[$index])) {
            unset($honorsAwards[$index]);
            session(['honors_awards' => array_values($honorsAwards)]);
        }
        return redirect()->route('home')->with('success', 'Entry removed successfully.');
    }
}
