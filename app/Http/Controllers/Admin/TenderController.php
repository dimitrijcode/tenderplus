<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $tenders = Tender::all();
        } else {
            $tenders = Tender::where('user_id', auth()->user()->id)->get();
        }

        return view('admin.tenders.index', compact('tenders'));
    }

    //
    public function create()
    {
        return view('admin.tenders.create');
    }

    public function store(Request $request)
    {
        // Validate the request (form data)
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'organization_name' => ['required', 'string', 'max:255'],
        ]);

        // Create a new tender
        Tender::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'organization_name' => $request['organization_name'],
            'location' => $request['location'],
            'budget' => $request['budget'] ?: null,
            'deadline' => $request['deadline'] ?: null,
            'source_url' => $request['source_url'] ?: null,
            'is_public' => $request->boolean('is_public'),
            'status' => $request['status'] ?? 'open',
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.tenders.index');
    }

    public function edit(Tender $tender)
    {
        abort_unless($tender->canChange(auth()->user()), 403);

        return view('admin.tenders.edit', compact('tender'));
    }

    public function update(Request $request, Tender $tender)
    {
        abort_unless($tender->canChange(auth()->user()), 403);

        // Validate the request (form data)
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'organization_name' => ['required', 'string', 'max:255'],
        ]);

        $tender->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'organization_name' => $request['organization_name'],
            'location' => $request['location'],
            'budget' => $request['budget'] ?: null,
            'deadline' => $request['deadline'] ?: null,
            'source_url' => $request['source_url'] ?: null,
            'is_public' => $request->boolean('is_public'),
            'status' => $request['status'] ?? 'open',
        ]);

        return redirect()->route('admin.tenders.index');
    }

    public function destroy(Tender $tender)
    {
        abort_unless($tender->canChange(auth()->user()), 403);

        $tender->delete();

        return redirect()->route('admin.tenders.index');
    }
}
