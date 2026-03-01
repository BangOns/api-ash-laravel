<?php

namespace App\Http\Controllers;

use App\Http\Resources\KelasResource;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index()
    {
        try {
            $paginator = Kelas::with('jurusan', 'waliKelas')->paginate(5);
            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => KelasResource::collection($paginator),
                'pagination' => [
                    'current_page' => $paginator->currentPage(),
                    'last_page' => $paginator->lastPage(),
                    'per_page' => $paginator->perPage(),
                    'total' => $paginator->total(),
                ],
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function show(Kelas $kelas)
    {
        try {
            dd($kelas);
            $data = new KelasResource($kelas);
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
                'nama_kelas' => "required|unique:kelas,nama_kelas|min:1",
                'jurusan_id' => 'required|exists:jurusan,id',
                'wali_kelas_id' => 'required|exists:wali_kelas,id'
            ], [
                'required' => ':attribute wajib diisi',
                'unique' => ':attribute sudah ada',
                'min' => ':attribute minimal 3 karakter',
                'exists' => ':attribute tidak ditemukan'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 422);
            }

            $data = Kelas::create(
                $request->only([
                    'nama_kelas',
                    'jurusan_id',
                    'wali_kelas_id'
                ])
            );
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
    public function update(Request $request, Kelas $kelas)
    {
        try {

            $validator = Validator::make($request->all(), [
                'nama_kelas' => "required|unique:kelas,nama_kelas|min:3",
                'jurusan_id' => 'required|exists:jurusan,id',
                'wali_kelas_id' => 'required|exists:wali_kelas,id'
            ], [
                'required' => ':attribute wajib diisi',
                'unique' => ':attribute sudah ada',
                'min' => ':attribute minimal 3 karakter',
                'exists' => ':attribute tidak ditemukan'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 422);
            }

            $data = $kelas::where('id', $kelas->id)->update(
                $request->only([
                    'nama_kelas',
                    'jurusan_id',
                    'wali_kelas_id'
                ])
            );
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
    public function destroy(Kelas $kelas)
    {
        try {
            $data = $kelas->delete();
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
