<?php

namespace App\Http\Controllers;

use App\Http\Requests\Kelas\KelasRequest;
use App\Http\Resources\KelasResource;
use App\Models\Kelas;
use App\Services\KelasServices;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function __construct(protected KelasServices $kelasServices, protected ApiResponse $apiResponse) {}

    public function index(Request $request)
    {

        $paginator = $this->kelasServices->getAllKelas(5, $request->query('search', ''));
        return $this->apiResponse->successResponse(
            KelasResource::collection($paginator),
            'Kelas retrieved successfully',
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
    public function show(Kelas $kelas)
    {
        return $this->apiResponse->successResponse(
            new KelasResource($kelas),
            'Success'
        );
    }
    public function store(KelasRequest $request)
    {
        $data = $this->kelasServices->addKelas($request->validated());
        return $this->apiResponse->successResponse(
            new KelasResource($data),
            'Kelas created successfully',
            201
        );
    }
    public function update(KelasRequest $request, Kelas $kelas)
    {
        $data = $this->kelasServices->updateKelas($request->validated(), $kelas);
        return $this->apiResponse->successResponse(
            new KelasResource($kelas),
            'Kelas updated successfully'
        );
    }
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return $this->apiResponse->successResponse(
            null,
            'Kelas deleted successfully'
        );
    }
}
