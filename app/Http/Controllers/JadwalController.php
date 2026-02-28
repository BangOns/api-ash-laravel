<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    public function index()
    {
        try {
            $data = Jadwal::latest()->paginate(10);
            return response()->json([
                'status' => true,
                'data' => $data,
                'message' => 'success'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function show(Jadwal $jadwal)
    {
        try {
            $data = $jadwal;
            return response()->json([
                'status' => true,
                'data' => $data,
                'message' => 'success'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'activity' => 'required|min:3',
                'date' => 'required|date_format:Y-m-d',
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i|after:start_time',
                'is_active' => 'required|boolean',
            ], [
                'required' => ':attribute wajib diisi',
                'min' => ':attribute minimal 3 karakter',
                'date_format' => ':attribute format tidak valid',
                'after' => ':attribute harus setelah start time'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 422);
            }
            $data = Jadwal::create($request->only([
                'activity',
                'date',
                'start_time',
                'end_time',
                'is_active'
            ]));
            return response()->json([
                'status' => true,
                'data' => $data,
                'message' => 'success'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function update(Request $request, Jadwal $jadwal)
    {
        try {
            $validator = Validator::make($request->all(), [
                'activity' => 'required|min:3',
                'date' => 'required|date_format:Y-m-d',
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i|after:start_time',
                'is_active' => 'required|boolean',
            ], [
                'required' => ':attribute wajib diisi',
                'min' => ':attribute minimal 3 karakter',
                'date_format' => ':attribute format tidak valid',
                'after' => ':attribute harus setelah start time'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 422);
            }
            $data = Jadwal::where('id', $jadwal->id)->update($request->only([
                'activity',
                'date',
                'start_time',
                'end_time',
                'is_active'
            ]));
            return response()->json([
                'status' => true,
                'data' => $data,
                'message' => 'success'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function destroy(Jadwal $jadwal)
    {
        try {
            $data = $jadwal->delete();
            return response()->json([
                'status' => true,
                'data' => $data,
                'message' => 'success'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
