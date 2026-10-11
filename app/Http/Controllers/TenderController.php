<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
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
            ->when($request->filled('keyword'), fn ($query) => $query->whereHas('keywords', fn ($q) => $q->whereKey($request->keyword)))
            ->get();

        $keyword_options = Keyword::orderBy('name')->pluck('name', 'id')->toArray();

        return view('tenders.index', compact('tenders', 'keyword_options'));
    }

    public function show(Tender $tender)
    {
        return view('tenders.show', compact('tender'));
    }
}
