<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    public function index()
    {
        try {
            $data = Jurusan::all();
            return response()->json([
                'status' => true,
                'data' => $data,
                'message' => 'success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function show(Jurusan $jurusan)
    {
        try {
            $data = $jurusan;
            if (empty($data)) {
                return response()->json([
                    'status' => false,
                    'message' => 'data not found'
                ], 404);
            };
            return response()->json([
                'status' => true,
                'data' => $data,
                'message' => 'success'
            ]);
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
                'nama_jurusan' => "required|unique:jurusan|min:3"
            ], [
                'required' => ':attribute wajib diisi',
                'unique' => ':attribute sudah ada',
                'min' => ':attribute minimal 3 karakter'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 422);
            }

            $data = Jurusan::create([
                'nama_jurusan' => $request->nama_jurusan
            ]);

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

    public function update(Request $request, Jurusan $jurusan)
    {
        try {

            $validator = Validator::make($request->all(), [
                'nama_jurusan' => "required|min:3"
            ], [
                'required' => ':attribute wajib diisi',
                'unique' => ':attribute sudah ada',
                'min' => ':attribute minimal 3 karakter'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 422);
            }

            $data = $jurusan->update([
                'nama_jurusan' => $request->nama_jurusan
            ]);

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
    public function destroy(Jurusan $jurusan)
    {
        try {
            $data = $jurusan->delete();
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
