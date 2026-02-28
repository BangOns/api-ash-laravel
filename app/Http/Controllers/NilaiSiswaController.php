<?php

namespace App\Http\Controllers;

use App\Http\Resources\NilaiSiswaResource;
use App\Models\NilaiSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NilaiSiswaController extends Controller
{
    public function index()
    {
        try {
            $paginator = NilaiSiswa::with('siswa', 'pelajaran', 'kelas')->paginate(5);

            return response()->json([
                'status' => true,
                'data' => NilaiSiswaResource::collection($paginator),
                'message' => 'success',
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
    public function show(NilaiSiswa $nilaiSiswa)
    {
        try {
            $data = new NilaiSiswaResource($nilaiSiswa);
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
                'tugas' => 'required|numeric',
                'uts' => 'required|numeric',
                'uas' => 'required|numeric',
                'siswa_id' => 'required|exists:siswa,id',
                'pelajaran_id' => 'required|exists:pelajaran,id',
                'kelas_id' => 'required|exists:kelas,id',
            ], [
                'required' => ':attribute wajib diisi',
                'exists' => ':attribute tidak ditemukan',
                'numeric' => ':attribute harus angka',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 422);
            }
            $rata = ((int)$request->tugas + (int)$request->uts + (int)$request->uas) / 3;

            $data = NilaiSiswa::create([
                'tugas' => $request->tugas,
                'uts' => $request->uts,
                'uas' => $request->uas,
                'rata_rata' => $rata,
                'siswa_id' => $request->siswa_id,
                'pelajaran_id' => $request->pelajaran_id,
                'kelas_id' => $request->kelas_id,
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
    public function update(Request $request, NilaiSiswa $nilaiSiswa)
    {
        try {
            $validator = Validator::make($request->all(), [
                'tugas' => 'required|numeric',
                'uts' => 'required|numeric',
                'uas' => 'required|numeric',
                'siswa_id' => 'required|exists:siswa,id',
                'pelajaran_id' => 'required|exists:pelajaran,id',
                'kelas_id' => 'required|exists:kelas,id',
            ], [
                'required' => ':attribute wajib diisi',
                'exists' => ':attribute tidak ditemukan',
                'numeric' => ':attribute harus angka',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 422);
            }
            $rata = ((int)$request->tugas + (int)$request->uts + (int)$request->uas) / 3;
            $data = $nilaiSiswa::where('id', $nilaiSiswa->id)->update([
                'tugas' => $request->tugas,
                'uts' => $request->uts,
                'uas' => $request->uas,
                'rata_rata' => $rata,
                'siswa_id' => $request->siswa_id,
                'pelajaran_id' => $request->pelajaran_id,
                'kelas_id' => $request->kelas_id,
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
    public function destroy(NilaiSiswa $nilaiSiswa)
    {
        try {
            $data = $nilaiSiswa->delete();
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
