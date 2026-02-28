<?php

namespace App\Http\Controllers;

use App\Http\Resources\PelajaranResource;
use App\Models\Pelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelajaranController extends Controller
{
    public function index()
    {
        try {
            $paginator = Pelajaran::with('kelas')->paginate(5);
            return response()->json([
                'status' => true,
                'data' => PelajaranResource::collection($paginator),
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
    public function show(Pelajaran $pelajaran)
    {
        try {
            $data = new PelajaranResource($pelajaran);
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
                'nama_pelajaran' => "required|unique:pelajaran|min:3",
                'kelas_id' => 'required|exists:kelas,id',
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

            $data = Pelajaran::create($request->only([
                'nama_pelajaran',
                'kelas_id',
                'wali_kelas_id'
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
    public function update(Request $request, Pelajaran $pelajaran)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_pelajaran' => "required|unique:pelajaran,nama_pelajaran,$pelajaran->id|min:3",
                'kelas_id' => 'required|exists:kelas,id',
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

            $data = $pelajaran::where('id', $pelajaran->id)->update($request->only([
                'nama_pelajaran',
                'kelas_id',
                'wali_kelas_id'
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
    public function destroy(Pelajaran $pelajaran)
    {
        try {
            $data = $pelajaran->delete();
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
