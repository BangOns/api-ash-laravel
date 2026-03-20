<?php

namespace App\Http\Controllers;

use App\Http\Requests\Siswa\SiswaRequest;
use App\Http\Resources\SiswaResource;
use App\Models\Siswa;
use App\Services\SiswaServices;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function __construct(protected SiswaServices $siswaServices, protected ApiResponse $apiResponse) {}
    public function index(Request $request)
    {
        $paginator = $this->siswaServices->getAllSiswa(5, $request->query('search', ''));
        return $this->apiResponse->successResponse(
            SiswaResource::collection($paginator),
            'Siswa retrieved successfully',
            200,
            [
                'pagination' => [
                    'current_page' => $paginator->currentPage(),
                    'last_page' => $paginator->lastPage(),
                    'per_page' => $paginator->perPage(),
                    'total' => $paginator->total(),
                ]
            ]
        );
    }
    public function show(Siswa $siswa)
    {
        return $this->apiResponse->successResponse(
            new SiswaResource($siswa),
            'Success'
        );
    }
    public function store(SiswaRequest $request)
    {
        $data = $this->siswaServices->addSiswa($request->validated());
        return $this->apiResponse->successResponse(
            new SiswaResource($data),
            'Siswa created successfully',
            201
        );
    }
    public function update(SiswaRequest $request, Siswa $siswa)
    {
        $data = $this->siswaServices->updateSiswa($request->validated(), $siswa);
        return $this->apiResponse->successResponse(
            new SiswaResource($data),
            'Siswa updated successfully'
        );
    }
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return $this->apiResponse->successResponse(
            null,
            'Siswa deleted successfully'
        );
    }
}
