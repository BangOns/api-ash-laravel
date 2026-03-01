<?php

namespace App\Http\Controllers;

use App\Http\Requests\Jurusan\JurusanRequest;
use App\Http\Resources\JurusanResourse;
use App\Models\Jurusan;


class JurusanController extends Controller
{
    public function index()
    {
        $paginator = Jurusan::latest()->paginate(5);
        return response()->json([
            'status' => true,
            'data' => JurusanResourse::collection($paginator),
            'message' => 'success',
            'pagination' => [
                'current_page' => $paginator->currentPage(),
                'last_page' => $paginator->lastPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
            ],
        ]);
    }
    public function show(Jurusan $jurusan)
    {
        $data = new JurusanResourse($jurusan);

        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'success'
        ]);
    }
    public function store(JurusanRequest $request)
    {

        $data = Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan
        ]);
        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'success'
        ], 201);
    }

    public function update(JurusanRequest $request, Jurusan $jurusan)
    {
        $data = Jurusan::where('id', $jurusan->id)->update([
            'nama_jurusan' => $request->nama_jurusan
        ]);
        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'success'
        ], 201);
    }
    public function destroy(Jurusan $jurusan)
    {
        $data = $jurusan->delete();
        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'success'
        ], 201);
    }
}
