<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use Illuminate\Contracts\View\View;

class KeywordController extends Controller
{
    public function index(): View
    {
        $keywords = Keyword::query()
            ->withCount('tenders')
            ->orderBy('name')
            ->get();

        return view('keywords.index', compact('keywords'));
    }

    public function show(Keyword $keyword): View
    {
        $keyword->loadCount('tenders');

        $tenders = $keyword->tenders()
            ->with('user')
            ->latest()
            ->get();

        return view('keywords.show', compact('tenders', 'keyword'));
    }
}
