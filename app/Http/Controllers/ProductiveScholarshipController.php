<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductiveScholarshipController extends Controller
{
    public function calculateTotal(Request $request)
    {
        $entries = $request->input('entries', []);
        $total = 0;

        foreach ($entries as $entry) {
            $total += floatval($entry['points']);
        }

        $total = round($total, 1);

        return view('hometest', ['total' => $total]);
    }
}
