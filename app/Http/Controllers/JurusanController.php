<?php

namespace App\Http\Controllers;

use App\Http\Requests\Jurusan\JurusanRequest;
use App\Http\Resources\JurusanResource;
use App\Models\Jurusan;
use App\Services\JurusanServices;
use App\Traits\ApiResponse;

class JurusanController extends Controller
{
    public function __construct(
        protected JurusanServices $jurusanServices,
        protected ApiResponse $apiResponse
    ) {}

    public function index()
    {
        $paginator = $this->jurusanServices->getAllJurusan(5);

        return $this->apiResponse->successResponse(
            JurusanResource::collection($paginator),
            'Jurusan retrieved successfully',
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

    public function show(Jurusan $jurusan)
    {
        return $this->apiResponse->successResponse(
            new JurusanResource($jurusan),
            'Success'
        );
    }

    public function store(JurusanRequest $request)
    {
        $data = $this->jurusanServices->addJurusan($request->validated());

        return $this->apiResponse->successResponse(
            new JurusanResource($data),
            'Jurusan created successfully',
            201
        );
    }

    public function update(JurusanRequest $request, Jurusan $jurusan)
    {
        $data = $this->jurusanServices->updateJurusan($request->validated(), $jurusan);

        return $this->apiResponse->successResponse(
            new JurusanResource($data),
            'Jurusan updated successfully'
        );
    }

    public function destroy(Jurusan $jurusan)
    {
        $this->jurusanServices->deleteJurusan($jurusan);

        return $this->apiResponse->successResponse(
            null,
            'Jurusan deleted successfully'
        );
    }
}
