<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tender;

class TenderController extends Controller
{
    public function index()
    {
        $tenders = Tender::all();

        return view('admin.tenders.index', compact('tenders'));
    }
}
