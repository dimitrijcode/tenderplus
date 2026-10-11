<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    //
    public function index(Request $request)
    {
        // Load the relevant tenders
        $tenders = Tender::public()
            ->when($request->filled('q'), fn ($query) => $query->where('title', 'like', '%'.$request->q.'%'))
            ->get();

        return view('tenders.index', compact('tenders'));
    }

    public function show(Tender $tender)
    {
        return view('tenders.show', compact('tender'));
    }
}
