<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use App\Models\Tender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the admin overview with a few counts.
     */
    public function __invoke(Request $request): View
    {
        abort_unless($request->user()->role === 'admin', 403);

        $counts = [
            'Tenders' => Tender::count(),
            'Users' => User::count(),
            'Keywords' => Keyword::count(),
        ];

        return view('admin.dashboard', compact('counts'));
    }
}
