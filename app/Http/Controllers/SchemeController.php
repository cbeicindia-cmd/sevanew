<?php

namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;

class SchemeController extends Controller
{
    public function index()
    {
        return view('admin.schemes.index', ['schemes' => Scheme::latest()->paginate(25)]);
    }

    public function create()
    {
        return view('admin.schemes.create');
    }

    public function store(Request $request)
    {
        Scheme::create($request->all());
        return redirect()->route('schemes.index')->with('success', 'Scheme added.');
    }

    public function edit(Scheme $scheme)
    {
        return view('admin.schemes.edit', compact('scheme'));
    }

    public function update(Request $request, Scheme $scheme)
    {
        $scheme->update($request->all());
        return back()->with('success', 'Scheme updated.');
    }

    public function destroy(Scheme $scheme)
    {
        $scheme->delete();
        return back()->with('success', 'Scheme deleted.');
    }
}
