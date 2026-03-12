<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scheme;
use Illuminate\Http\Request;

class SchemeManagementController extends Controller
{
    public function index()
    {
        $schemes = Scheme::latest()->paginate(20);
        return view('admin.schemes', compact('schemes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'scheme_name' => 'required|string',
            'scheme_code' => 'required|string|unique:schemes,scheme_code',
            'state' => 'required|string',
            'category' => 'required|string',
            'department' => 'required|string',
            'description' => 'required|string',
            'benefits' => 'required|string',
            'eligibility' => 'required|string',
            'documents_required' => 'required|string',
            'application_process' => 'required|string',
            'official_link' => 'nullable|url',
            'last_updated' => 'nullable|date',
        ]);

        Scheme::create($data);
        return back()->with('status', 'Scheme created successfully.');
    }
}
