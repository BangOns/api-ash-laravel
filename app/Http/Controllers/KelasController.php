<?php

namespace App\Http\Controllers;

use App\Http\Requests\Kelas\KelasRequest;
use App\Http\Resources\KelasResource;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index()
    {
        $paginator = Cache::remember('kelas.list', 60, function () {
            return Kelas::with(['jurusan', 'waliKelas'])->paginate(10);
        });
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
    }
    public function show(Kelas $kelas)
    {
        $data = new KelasResource($kelas);
        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'success'
        ]);
    }
    public function store(KelasRequest $request)
    {
        $data = Kelas::create(
            $request->validated()
        );
        return response()->json([
            'status' => true,
            'message' => 'success'
        ], 201);
    }
    public function update(KelasRequest $request, Kelas $kelas)
    {
        $data = $kelas::where('id', $kelas->id)->update(
            $request->validated()
        );
        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'success'
        ], 200);
    }
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ], 200);
    }
}
