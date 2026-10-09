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
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'organization_name' => ['required', 'string', 'max:255'],
        ]);

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
