<?php

namespace App\Http\Controllers;

use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WaliKelasController extends Controller
{
    public function index()
    {
        try {
            $data = WaliKelas::all();
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
    public function show(WaliKelas $wali_kelas)
    {
        try {
            $data = $wali_kelas;
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
            $rules = [
                'nama_wali_kelas' => 'required|unique:wali_kelas',
                'telp' => 'required|min:12|max:12',
                'email' => 'required|email|unique:wali_kelas',
                'jkl' => 'required|in:L,P',
            ];
            $validator = Validator::make($request->all(), $rules, [
                'required' => ':attribute wajib diisi',
                'unique' => ':attribute sudah ada',
                'min' => ':attribute belum memenuhi syarat'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 422);
            }

            $data = WaliKelas::create([
                'nama_wali_kelas' => $request->nama_wali_kelas
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
    public function update(Request $request, WaliKelas $wali_kelas)
    {
        try {
            $rules = [
                'nama_wali_kelas' => 'required|unique:wali_kelas',
                'telp' => 'required|min:12|max:12',
                'email' => 'required|email|unique:wali_kelas',
                'jkl' => 'required|in:L,P',
            ];

            $validator = Validator::make($request->all(), $rules, [
                'required' => ':attribute wajib diisi',
                'unique' => ':attribute sudah ada',
                'min' => ':attribute belum memenuhi syarat'

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 422);
            }

            $data = $wali_kelas::where('id', $wali_kelas->id)->update([
                'nama_wali_kelas' => $request->nama_wali_kelas
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
    public function destroy(WaliKelas $wali_kelas)
    {
        try {
            $data = $wali_kelas->delete();
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
