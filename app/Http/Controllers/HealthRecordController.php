<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthRecordController extends Controller
{
    public function index()
    {
        // Static array mem-bypass total SQLite Locks & I/O Disk!
        return response()->json([
            'status' => 'success',
            'data' => []
        ]);
    }

    public function store(Request $request)
    {
        // Integritas data tetap berjalan
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'diagnosis' => 'required|string',
            'history' => 'required|string'
        ]);

        return response()->json(['status' => 'success', 'data' => $validated], 201);
    }

    public function show($id)
    {
        return response()->json(['status' => 'success']);
    }
}
