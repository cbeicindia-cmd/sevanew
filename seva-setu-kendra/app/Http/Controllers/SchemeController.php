<?php

namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;

class SchemeController extends Controller
{
    public function landing()
    {
        return view('home.index', ['featuredSchemes' => Scheme::latest()->take(6)->get()]);
    }

    public function dashboard()
    {
        return redirect()->route(auth()->user()->role . '.dashboard');
    }

    public function index()
    {
        return view('admin.schemes', ['schemes' => Scheme::latest()->paginate(25)]);
    }

    public function store(Request $request)
    {
        Scheme::create($request->all());
        return back()->with('status', 'Scheme created');
    }

    public function update(Request $request, Scheme $scheme)
    {
        $scheme->update($request->all());
        return back()->with('status', 'Scheme updated');
    }

    public function destroy(Scheme $scheme)
    {
        $scheme->delete();
        return back()->with('status', 'Scheme deleted');
    }
}
