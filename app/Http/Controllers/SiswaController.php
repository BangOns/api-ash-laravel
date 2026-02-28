<?php

namespace App\Http\Controllers;

use App\Http\Resources\SiswaResource;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        try {
            $paginator = Siswa::with('kelas', 'jurusan')->paginate(5);
            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => SiswaResource::collection($paginator),
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
    public function show(Siswa $siswa)
    {
        try {
            $data = new SiswaResource($siswa);
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
                'nama_siswa' => 'required|min:3',
                'jkl' => 'required|in:L,P',
                'kelas_id' => 'required|exists:kelas,id',
                'jurusan_id' => 'required|exists:jurusan,id'
            ], [
                'required' => ':attribute wajib diisi',
                'min' => ':attribute minimal 3 karakter',
                'exists' => ':attribute tidak ditemukan',
                'in' => ':attribute harus salah satu dari :values'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 422);
            };

            $data = Siswa::create(
                $request->only([
                    'nama_siswa',
                    'jkl',
                    'kelas_id',
                    'jurusan_id'
                ])
            );
            return response()->json([
                'status' => true,
                'data' => new SiswaResource($data),
                'message' => 'success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function update(Request $request, Siswa $siswa)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_siswa' => 'required|min:3',
                'jkl' => 'required|in:L,P',
                'kelas_id' => 'required|exists:kelas,id',
                'jurusan_id' => 'required|exists:jurusan,id'
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
            };

            $data = $siswa::where('id', $siswa->id)->update(
                $request->only([
                    'nama_siswa',
                    'jkl',
                    'kelas_id',
                    'jurusan_id'
                ])
            );
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
    public function destroy(Siswa $siswa)
    {
        try {
            $data = $siswa->delete();
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
