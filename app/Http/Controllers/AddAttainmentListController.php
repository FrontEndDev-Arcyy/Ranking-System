<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddAttainmentListController extends Controller
{
    // Store a new list item
    public function store(Request $request)
    {
        $items = $request->session()->get('items', []);
        $items[] = $request->input('new_item');
        $request->session()->put('items', $items);

        return back();
    }

    // Update an existing list item
    public function update(Request $request, $index)
    {
        $items = $request->session()->get('items', []);
        if (isset($items[$index])) {
            $items[$index] = $request->input('edited_item');
            $request->session()->put('items', $items);
        }

        return back();
    }

    // Delete a list item
    public function destroy(Request $request, $index)
    {
        $items = $request->session()->get('items', []);
        if (isset($items[$index])) {
            unset($items[$index]);
            $request->session()->put('items', array_values($items)); // Re-index the array
        }

        return back();
    }
}
