<?php

namespace App\Http\Controllers;

use App\Data\ApiDocumentation;
use Illuminate\Http\Request;

class DocsController extends Controller
{
    public function index(Request $request)
    {
        $list_data_api = [
            "Siswa",
            "Kelas",
            "Pelajaran",
            "Kelas",
            "Wali Kelas",
            "Jurusan",
            "Kehadiran",
            "Nilai Siswa"
        ];
        $methods = ApiDocumentation::getCrudMethods();
        $key = strtolower($request->query('category'));

        $data = $methods[$key] ?? [];


        return view('welcome', [
            'list_api' => $list_data_api,
            'data_method_api' => $data,
            'category' => $request->query('category')
        ]);
    }
}
