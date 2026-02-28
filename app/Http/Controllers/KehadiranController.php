<?php

namespace App\Http\Controllers;

use App\Http\Resources\KehadiranResource;
use App\Models\Kehadiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KehadiranController extends Controller
{
    public function index()
    {
        try {
            $paginator = Kehadiran::with('siswa', 'kelas', 'pelajaran')->paginate(5);
            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => KehadiranResource::collection($paginator),
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
    public function show(Kehadiran $kehadiran)
    {
        try {
            $data = new KehadiranResource($kehadiran);
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
                'siswa_id' => 'required|exists:siswa,id',
                'kelas_id' => 'required|exists:kelas,id',
                'pelajaran_id' => 'required|exists:pelajaran,id',
                'tanggal' => 'required|date',
                'status' => 'required|in:Hadir,Izin,Sakit',
            ], [
                'required' => ':attribute wajib diisi',
                'exists' => ':attribute tidak ditemukan',
                'date' => ':attribute harus tanggal',
                'in' => ':attribute harus ada di dalam opsi'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 422);
            }
            $data = Kehadiran::create($request->only([
                'siswa_id',
                'kelas_id',
                'pelajaran_id',
                'tanggal',
                'status'
            ]));
            return response()->json([
                'status' => true,
                'data' => new KehadiranResource($data),
                'message' => 'success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function update(Request $request, Kehadiran $kehadiran)
    {
        try {
            $validator = Validator::make($request->all(), [
                'siswa_id' => 'required|exists:siswa,id',
                'kelas_id' => 'required|exists:kelas,id',
                'pelajaran_id' => 'required|exists:pelajaran,id',
                'tanggal' => 'required|date',
                'status' => 'required|in:Hadir,Izin,Sakit',
            ], [
                'required' => ':attribute wajib diisi',
                'exists' => ':attribute tidak ditemukan',
                'date' => ':attribute harus tanggal',
                'in' => ':attribute harus ada di dalam opsi'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 422);
            }
            $data = $kehadiran::where('id', $kehadiran->id)->update($request->only([
                'siswa_id',
                'kelas_id',
                'pelajaran_id',
                'tanggal',
                'status'
            ]));
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
    public function destroy(Kehadiran $kehadiran)
    {
        try {
            $data = $kehadiran->delete();
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
