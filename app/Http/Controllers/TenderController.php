<?php

namespace App\Http\Controllers;

use App\Models\Tender;

class TenderController extends Controller
{
    //
    public function index()
    {
        // Load the relevant tenders
        $tenders = Tender::all();

        return view('tenders.index', compact('tenders'));
    }
}
