<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class KeywordController extends Controller implements HasMiddleware
{
    /**
     * Keywords are shared by all tenders, so only admins may manage them.
     */
    public static function middleware(): array
    {
        return [
            function (Request $request, Closure $next) {
                abort_unless($request->user()->role === 'admin', 403);

                return $next($request);
            },
        ];
    }

    public function index()
    {
        $keywords = Keyword::all();

        return view('admin.keywords.index', compact('keywords'));
    }

    public function create()
    {
        return view('admin.keywords.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Keyword::create([
            'name' => $request['name'],
        ]);

        return redirect()->route('admin.keywords.index');
    }

    public function edit(Keyword $keyword)
    {
        return view('admin.keywords.edit', compact('keyword'));
    }

    public function update(Request $request, Keyword $keyword)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $keyword->update([
            'name' => $request['name'],
        ]);

        return redirect()->route('admin.keywords.index');
    }
}
