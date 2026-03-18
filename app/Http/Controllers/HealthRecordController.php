<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthRecord;
use Illuminate\Support\Facades\Cache;

class HealthRecordController extends Controller
{
    public function index()
    {
        $records = Cache::remember('health_records_all', 600, function () {
            return HealthRecord::all();
        });

        return response()->json([
            'status' => 'success',
            'data' => $records
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'diagnosis' => 'required|string',
            'history' => 'required|string'
        ]);

        $record = HealthRecord::create($validated);
        Cache::forget('health_records_all');

        return response()->json([
            'status' => 'success',
            'data' => $record
        ], 201);
    }

    public function show($id)
    {
        $record = Cache::remember("health_record_{$id}", 600, function () use ($id) {
            return HealthRecord::findOrFail($id);
        });

        return response()->json([
            'status' => 'success',
            'data' => $record
        ]);
    }
}
