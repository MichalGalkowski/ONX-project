<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class EntryController extends Controller
{

    public function index()
    {
        return inertia('Entry/Index', [
            'entries' => Entry::all()
        ]);
    }

    public function create()
    {
        return inertia('Entry/Create');
    }

    public function store(Request $request)
    {
        Entry::create($request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required',
            'tags' => 'required',
        ]));
        return redirect()->route('entry.index');
    }

    public function show(Entry $entry)
    {
        return inertia(
            'Entry/Show',
            [
                'entry' => $entry
            ]
            );
    }

    public function edit(Entry $entry)
    {
        return inertia(
            'Entry/Edit',
            [
                'entry' => $entry
            ]
            );
    }

    public function update(Request $request, Entry $entry)
    {
        $entry->update($request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required',
            'tags' => 'required',
        ]));
        return redirect()->route('entry.index');
    }

    public function destroy(Entry $entry)
    {
        $entry->delete();
        return redirect()->route('entry.index');
    }
}
