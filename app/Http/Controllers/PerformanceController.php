<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerformancePoints;

class PerformanceController extends Controller
{
    public function index()
    {
        $performances = Performance::all(); // Fetch all performance records
        return view('home', compact('performances'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'points' => 'required|numeric',
        ]);

        Performance::create($request->all()); // Create a new performance record
        return redirect()->route('performance.index')->with('success', 'Performance added successfully.');
    }

    public function destroy($id)
    {
        $performance = Performance::findOrFail($id);
        $performance->delete(); // Delete the performance record
        return redirect()->route('performance.index')->with('success', 'Performance deleted successfully.');
    }
}
