<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    public function index()
    {
        $tenders = Tender::all();

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
        // $tender contains the referenced tender

        return view('admin.tenders.edit', compact('tender'));
    }

    public function update(Request $request, Tender $tender)
    {
        // Validate the request (form data)

        $tender->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'organization_name' => $request['organization_name'],
        ]);

        return redirect()->route('admin.tenders.index');
    }

    public function destroy(Tender $tender)
    {
        $tender->delete();

        return redirect()->route('admin.tenders.index');
    }
}
