<?php

namespace App\Http\Controllers\Userzone;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $recommended = Tender::public()
            ->open()
            ->whereHas('keywords', fn ($query) => $query->whereIn('keywords.id', $request->user()->keywords()->pluck('keywords.id')))
            ->get();

        return view('userzone.dashboard', compact('recommended'));
    }
}
