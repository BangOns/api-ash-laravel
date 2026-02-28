<?php

namespace App\Data;

class ApiDocumentation
{
    public static function getCrudMethods()
    {
        return [
            'siswa' => [
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/siswa',
                    'description' => 'Get all siswa',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [
                                    [
                                        'id' => 1,
                                        'name' => 'John Doe',
                                        'email' => 'john@example.com',
                                        'created_at' => '2024-01-01'
                                    ]
                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'siswa not found',
                                'error_code' => 'USER_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/siswa/{id}',
                    'description' => 'Get all siswa',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [

                                    'id' => 1,
                                    'name' => 'John Doe',
                                    'email' => 'john@example.com',
                                    'created_at' => '2024-01-01'

                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'siswa not found',
                                'error_code' => 'USER_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'POST',
                    'color' => 'blue',
                    'endpoint' => '/api/siswa',
                    'description' => 'Create new user',
                    'parameters' => [
                        'name' => 'string (required)',
                        'email' => 'email (required)',
                        'password' => 'string (required, min:8)',
                        'role' => 'string (optional, default: user)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'User created successfully',
                                'data' => [
                                    'id' => 1,
                                    'name' => 'John Doe',
                                    'email' => 'john@example.com',
                                    'role' => 'user'
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'name' => ['Name field is required'],
                                    'email' => ['Email must be valid']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'PUT',
                    'color' => 'yellow',
                    'endpoint' => '/api/siswa/{id}',
                    'description' => 'Update new user',
                    'parameters' => [
                        'name' => 'string (required)',
                        'email' => 'email (required)',
                        'password' => 'string (required, min:8)',
                        'role' => 'string (optional, default: user)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'User update successfully',
                                'data' => [
                                    'id' => 1,
                                    'name' => 'John Doe',
                                    'email' => 'john@example.com',
                                    'role' => 'user'
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'name' => ['Name field is required'],
                                    'email' => ['Email must be valid']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'DELETE',
                    'color' => 'red',
                    'endpoint' => '/api/siswa/{id}',
                    'description' => 'Delete user',
                    'parameters' => [
                        ''
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'User delete successfully',
                                'data' => [
                                    'id' => 1,
                                    'name' => 'John Doe',
                                    'email' => 'john@example.com',
                                    'role' => 'user'
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'name' => ['Name field is required'],
                                    'email' => ['Email must be valid']
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'kelas' => [
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/kelas',
                    'description' => 'Get all kelas',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [
                                    [
                                        "id" => "0199cb40-cecf-3c58-aa85-854caa7dff1e",
                                        "nama_kelas" => "XII RPL 1",
                                        "jurusan" => [
                                            "id" => "d0e88367-1adb-363c-8211-f7c5f6aab4fe",
                                            "nama_jurusan" => "Rekayasa Perangkat Lunak"
                                        ],
                                        "wali_kelas" => [
                                            "id" => "14c13336-f95a-3819-a7cf-c470354c7e59",
                                            "nama_wali_kelas" => "Violet Yuni Hassanah S.Psi"
                                        ]
                                    ]
                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'siswa not found',
                                'error_code' => 'USER_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/kelas/{id}',
                    'description' => 'Get kelas by ID',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [

                                    "id" => "0199cb40-cecf-3c58-aa85-854caa7dff1e",
                                    "nama_kelas" => "XII RPL 1",
                                    "jurusan" => [
                                        "id" => "d0e88367-1adb-363c-8211-f7c5f6aab4fe",
                                        "nama_jurusan" => "Rekayasa Perangkat Lunak"
                                    ],
                                    "wali_kelas" => [
                                        "id" => "14c13336-f95a-3819-a7cf-c470354c7e59",
                                        "nama_wali_kelas" => "Violet Yuni Hassanah S.Psi"
                                    ]


                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'siswa not found',
                                'error_code' => 'USER_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'POST',
                    'color' => 'blue',
                    'endpoint' => '/api/kelas',
                    'description' => 'Create new kelas',
                    'parameters' => [
                        'nama_kelas' => "string(required, unique)",
                        'jurusan_id' => 'string (required, exists:jurusan,id)',
                        'wali_kelas_id' => 'string (required, exists:wali_kelas,id)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'Kelas created successfully',
                                'data' => [
                                    'id' => 1,
                                    'nama_kelas' => 'XII RPL 1',
                                    'jurusan_id' => 1,
                                    'wali_kelas_id' => 1
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'name' => ['Name field is required'],
                                    'email' => ['Email must be valid']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'PUT',
                    'color' => 'yellow',
                    'endpoint' => '/api/kelas/{id}',
                    'description' => 'Update new kelas',
                    'parameters' => [
                        'nama_kelas' => "string(required, unique)",
                        'jurusan_id' => 'string (required, exists:jurusan,id)',
                        'wali_kelas_id' => 'string (required, exists:wali_kelas,id)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'User update successfully',
                                'data' => [
                                    'id' => 1,
                                    'name' => 'John Doe',
                                    'email' => 'john@example.com',
                                    'role' => 'user'
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'name' => ['Name field is required'],
                                    'email' => ['Email must be valid']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'DELETE',
                    'color' => 'red',
                    'endpoint' => '/api/kelas/{id}',
                    'description' => 'Delete kelas',
                    'parameters' => [
                        ''
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'Kelas delete successfully',
                                'data' => [
                                    'id' => 1,
                                    'nama_kelas' => 'XII RPL 1',
                                    'jurusan_id' => 1,
                                    'wali_kelas_id' => 1
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'name' => ['Name field is required'],
                                    'email' => ['Email must be valid']
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'jurusan' => [
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/jurusan',
                    'description' => 'Get all jurusan',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [
                                    [
                                        "id" => "0199cb40-cecf-3c58-aa85-854caa7dff1e",
                                        "nama_kelas" => "XII RPL 1",
                                        "jurusan" => [
                                            "id" => "d0e88367-1adb-363c-8211-f7c5f6aab4fe",
                                            "nama_jurusan" => "Rekayasa Perangkat Lunak"
                                        ],
                                        "wali_kelas" => [
                                            "id" => "14c13336-f95a-3819-a7cf-c470354c7e59",
                                            "nama_wali_kelas" => "Violet Yuni Hassanah S.Psi"
                                        ]
                                    ]
                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'siswa not found',
                                'error_code' => 'USER_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/jurusan/{id}',
                    'description' => 'Get a specific jurusan',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [

                                    "id" => "0199cb40-cecf-3c58-aa85-854caa7dff1e",
                                    "nama_kelas" => "XII RPL 1",
                                    "jurusan" => [
                                        "id" => "d0e88367-1adb-363c-8211-f7c5f6aab4fe",
                                        "nama_jurusan" => "Rekayasa Perangkat Lunak"
                                    ],
                                    "wali_kelas" => [
                                        "id" => "14c13336-f95a-3819-a7cf-c470354c7e59",
                                        "nama_wali_kelas" => "Violet Yuni Hassanah S.Psi"
                                    ]


                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'siswa not found',
                                'error_code' => 'USER_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'POST',
                    'color' => 'blue',
                    'endpoint' => '/api/jurusan',
                    'description' => 'Create new jurusan',
                    'parameters' => [
                        'nama_jurusan' => "string(required, unique)",
                        'deskripsi' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'User created successfully',
                                'data' => [
                                    'id' => 1,
                                    'name' => 'John Doe',
                                    'email' => 'john@example.com',
                                    'role' => 'user'
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'name' => ['Name field is required'],
                                    'email' => ['Email must be valid']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'PUT',
                    'color' => 'yellow',
                    'endpoint' => '/api/jurusan/{id}',
                    'description' => 'Update new jurusan',
                    'parameters' => [
                        'nama_jurusan' => "string(required, unique)",
                        'deskripsi' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'Jurusan update successfully',
                                'data' => [
                                    'id' => 1,
                                    'nama_jurusan' => 'Rekayasa Perangkat Lunak',
                                    'deskripsi' => 'Jurusan untuk menghasilkan perangkat lunak yang berkualitas tinggi'

                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'name' => ['Name field is required'],
                                    'email' => ['Email must be valid']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'DELETE',
                    'color' => 'red',
                    'endpoint' => '/api/jurusan/{id}',
                    'description' => 'Delete jurusan',
                    'parameters' => [
                        ''
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'Jurusan delete successfully',
                                'data' => [
                                    'id' => 1,
                                    'nama_jurusan' => 'Rekayasa Perangkat Lunak',
                                    'deskripsi' => 'Jurusan untuk menghasilkan perangkat lunak yang berkualitas tinggi'
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'name' => ['Name field is required'],
                                    'email' => ['Email must be valid']
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'wali_kelas' => [
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/wali-kelas',
                    'description' => 'Get all wali-kelas',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [
                                    [
                                        [
                                            "id" => "028a5a4a-864d-3a86-b5db-fe38dc4c750f",
                                            "nama_wali_kelas" => "Danu Utama",
                                            "telp" => "0568 2583 8266",
                                            "email" => "gabriella.hastuti@example.net",
                                            "jkl" => "P",
                                            "created_at" => "2026-02-22T06:41:40.000000Z",
                                            "updated_at" => "2026-02-22T06:41:40.000000Z"
                                        ],
                                        [
                                            "id" => "0390f394-042d-3574-94c9-4dc9a0d462c9",
                                            "nama_wali_kelas" => "Cawisono Wibisono",
                                            "telp" => "(+62) 598 7710 172",
                                            "email" => "yuniar.tasdik@example.net",
                                            "jkl" => "L",
                                            "created_at" => "2026-02-22T06:41:40.000000Z",
                                            "updated_at" => "2026-02-22T06:41:40.000000Z"
                                        ]
                                    ]
                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'wali-kelas not found',
                                'error_code' => 'USER_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/wali-kelas/{id}',
                    'description' => 'Get a specific wali-kelas',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [
                                    "id" => "028a5a4a-864d-3a86-b5db-fe38dc4c750f",
                                    "nama_wali_kelas" => "Danu Utama",
                                    "telp" => "0568 2583 8266",
                                    "email" => "gabriella.hastuti@example.net",
                                    "jkl" => "P",
                                    "created_at" => "2026-02-22T06:41:40.000000Z",
                                    "updated_at" => "2026-02-22T06:41:40.000000Z"
                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'siswa not found',
                                'error_code' => 'USER_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'POST',
                    'color' => 'blue',
                    'endpoint' => '/api/wali-kelas',
                    'description' => 'Create new wali-kelas',
                    'parameters' => [
                        'nama_wali_kelas' => "string(required)",
                        'telp' => "string(required)",
                        'email' => "string(required, unique)",
                        'jkl' => "string(required)"
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'wali-kelas created successfully',
                                'data' => [
                                    'id' => 1,
                                    'nama_wali_kelas' => 'John Doe',
                                    'telp' => '081234567890',
                                    'email' => 'john@example.com',
                                    'jkl' => 'L'
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'nama_wali_kelas' => ['Nama wali kelas field is required'],
                                    'telp' => ['Telp field is required'],
                                    'email' => ['Email must be valid'],
                                    'jkl' => ['Jenis kelamin field is required']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'PUT',
                    'color' => 'yellow',
                    'endpoint' => '/api/wali-kelas/{id}',
                    'description' => 'Update new jurusan',
                    'parameters' => [
                        'nama_jurusan' => "string(required, unique)",
                        'deskripsi' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'Wali kelas update successfully',
                                'data' => [
                                    'id' => 1,
                                    'nama_wali_kelas' => 'John Doe',
                                    'telp' => '081234567890',
                                    'email' => 'john.doe@example.com',
                                    'jkl' => 'L'

                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'nama_wali_kelas' => ['Nama wali kelas field is required'],
                                    'telp' => ['Telp field is required'],
                                    'email' => ['Email must be valid'],
                                    'jkl' => ['Jenis kelamin field is required']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'DELETE',
                    'color' => 'red',
                    'endpoint' => '/api/wali-kelas/{id}',
                    'description' => 'Delete wali-kelas',
                    'parameters' => [
                        ''
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'Wali kelas delete successfully',
                                'data' => [
                                    'id' => 1,
                                    'nama_wali_kelas' => 'John Doe',
                                    'telp' => '081234567890',
                                    'email' => 'john.doe@example.com',
                                    'jkl' => 'L'
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'nama_wali_kelas' => ['Nama wali kelas field is required'],
                                    'telp' => ['Telp field is required'],
                                    'email' => ['Email must be valid'],
                                    'jkl' => ['Jenis kelamin field is required']
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'pelajaran' => [
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/pelajaran',
                    'description' => 'Get all pelajaran',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [
                                    [
                                        [
                                            "id" => "01f87675-8422-33a9-b918-3c77c14d766b",
                                            "nama_pelajaran" => "Aisyah Tina Novitasari",
                                            "kelas" => [
                                                "id" => "d309e01f-eb0f-3734-92a8-e1b8c4b1d949",
                                                "nama_kelas" => "Ophelia Mandasari S.Kom"
                                            ],
                                            "wali_kelas" => [
                                                "id" => "a62c9bf1-7131-3e62-bfce-4f9dff9c09bb",
                                                "nama_wali_kelas" => "Elvina Susanti S.Pt"
                                            ]
                                        ],
                                        [
                                            "id" => "0924ff66-a1de-383f-aed1-f12a00cfd097",
                                            "nama_pelajaran" => "Zahra Hasanah",
                                            "kelas" => [
                                                "id" => "e407b267-056e-32c5-8c6c-29c44448e92d",
                                                "nama_kelas" => "Gabriella Usamah"
                                            ],
                                            "wali_kelas" => [
                                                "id" => "0b944161-2b82-35d5-959e-97d8257b44ff",
                                                "nama_wali_kelas" => "Nugraha Prasetyo S.Ked"
                                            ]
                                        ]
                                    ]
                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'pelajaran not found',
                                'error_code' => 'PELAJARAN_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/pelajaran/{id}',
                    'description' => 'Get a specific pelajaran',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [
                                    "id" => "0924ff66-a1de-383f-aed1-f12a00cfd097",
                                    "nama_pelajaran" => "Zahra Hasanah",
                                    "kelas" => [
                                        "id" => "e407b267-056e-32c5-8c6c-29c44448e92d",
                                        "nama_kelas" => "Gabriella Usamah"
                                    ],
                                    "wali_kelas" => [
                                        "id" => "0b944161-2b82-35d5-959e-97d8257b44ff",
                                        "nama_wali_kelas" => "Nugraha Prasetyo S.Ked"
                                    ]
                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'pelajaran not found',
                                'error_code' => 'PELAJARAN_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'POST',
                    'color' => 'blue',
                    'endpoint' => '/api/pelajaran',
                    'description' => 'Create new pelajaran',
                    'parameters' => [
                        'nama_pelajaran' => "string(required)",
                        'kelas_id' => "uuid(required)",
                        'wali_kelas_id' => "uuid(required)",
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'pelajaran created successfully',
                                'data' => [
                                    'id' => 1,
                                    'nama_pelajaran' => 'Matematika',
                                    'kelas_id' => 'e407b267-056e-32c5-8c6c-29c44448e92d',
                                    'wali_kelas_id' => '0b944161-2b82-35d5-959e-97d8257b44ff'
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'nama_pelajaran' => ['Nama pelajaran field is required'],
                                    'kelas_id' => ['Kelas ID field is required'],
                                    'wali_kelas_id' => ['Wali kelas ID field is required']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'PUT',
                    'color' => 'yellow',
                    'endpoint' => '/api/pelajaran/{id}',
                    'description' => 'Update new pelajaran',
                    'parameters' => [
                        'nama_pelajaran' => "string(required)",
                        'kelas_id' => "uuid(required)",
                        'wali_kelas_id' => "uuid(required)"
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'Pelajaran update successfully',
                                'data' => [
                                    'id' => 1,
                                    'nama_pelajaran' => 'Matematika',
                                    'kelas_id' => 'e407b267-056e-32c5-8c6c-29c44448e92d',
                                    'wali_kelas_id' => '0b944161-2b82-35d5-959e-97d8257b44ff'
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'nama_pelajaran' => ['Nama pelajaran field is required'],
                                    'kelas_id' => ['Kelas ID     field is required'],
                                    'wali_kelas_id' => ['Wali kelas ID field is required']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'DELETE',
                    'color' => 'red',
                    'endpoint' => '/api/pelajaran/{id}',
                    'description' => 'Delete pelajaran',
                    'parameters' => [
                        ''
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'Pelajaran delete successfully',
                                'data' => [
                                    'id' => 1,
                                    'nama_pelajaran' => 'Matematika',
                                    'kelas_id' => 'e407b267-056e-32c5-8c6c-29c44448e92d',
                                    'wali_kelas_id' => '0b944161-2b82-35d5-959e-97d8257b44ff'
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'nama_pelajaran' => ['Nama pelajaran field is required'],
                                    'kelas_id' => ['Kelas ID field is required'],
                                    'wali_kelas_id' => ['Wali kelas ID field is required']
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'kehadiran' => [
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/kehadiran',
                    'description' => 'Get all kehadiran',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [
                                    [
                                        [
                                            "id" => "1a86bb9e-2a0c-3acd-96ba-92e20d014d58",
                                            "status" => "Hadir",
                                            "tanggal" => null,
                                            "siswa" => [
                                                "id" => "431cdb2a-c673-3336-a096-74f02becc8a9",
                                                "nama_siswa" => "Asmuni Budiman"
                                            ],
                                            "kelas" => [
                                                "id" => "06144214-a806-3c88-8e59-3544c3a740aa",
                                                "nama_kelas" => "Adiarja Capa Mandala S.E.I"
                                            ],
                                            "pelajaran" => [
                                                "id" => "01f87675-8422-33a9-b918-3c77c14d766b",
                                                "nama_pelajaran" => "Aisyah Tina Novitasari"
                                            ]
                                        ],
                                        [
                                            "id" => "2fd74b9b-ccde-3b7b-801d-93cd86e8b96b",
                                            "status" => "Sakit",
                                            "tanggal" => null,
                                            "siswa" => [
                                                "id" => "0a6fc2cd-f044-346d-8d1b-e2f782aec845",
                                                "nama_siswa" => "Titin Rahmawati"
                                            ],
                                            "kelas" => [
                                                "id" => "a8eb92ad-2781-3d56-863a-8790ce6906a5",
                                                "nama_kelas" => "Harjaya Irwan Wibisono"
                                            ],
                                            "pelajaran" => [
                                                "id" => "dea7f59d-cc43-3862-ae1b-119ee674bf32",
                                                "nama_pelajaran" => "Elvina Endah Wulandari S.H."
                                            ]
                                        ]
                                    ]
                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'pelajaran not found',
                                'error_code' => 'PELAJARAN_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/kehadiran/{id}',
                    'description' => 'Get a specific kehadiran',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [
                                    "id" => "2fd74b9b-ccde-3b7b-801d-93cd86e8b96b",
                                    "status" => "Sakit",
                                    "tanggal" => null,
                                    "siswa" => [
                                        "id" => "0a6fc2cd-f044-346d-8d1b-e2f782aec845",
                                        "nama_siswa" => "Titin Rahmawati"
                                    ],
                                    "kelas" => [
                                        "id" => "a8eb92ad-2781-3d56-863a-8790ce6906a5",
                                        "nama_kelas" => "Harjaya Irwan Wibisono"
                                    ],
                                    "pelajaran" => [
                                        "id" => "dea7f59d-cc43-3862-ae1b-119ee674bf32",
                                        "nama_pelajaran" => "Elvina Endah Wulandari S.H."
                                    ]
                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'kehadiran not found',
                                'error_code' => 'KEHADIRAN_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'POST',
                    'color' => 'blue',
                    'endpoint' => '/api/kehadiran',
                    'description' => 'Create new kehadiran',
                    'parameters' => [
                        'siswa_id' => "uuid(required)",
                        'kelas_id' => "uuid(required)",
                        'status' => "string(required)",
                        'tanggal' => "date(required)",
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'kehadiran created successfully',
                                'data' => [
                                    'id' => 1,
                                    'siswa_id' => '0a6fc2cd-f044-346d-8d1b-e2f782aec845',
                                    'kelas_id' => 'a8eb92ad-2781-3d56-863a-8790ce6906a5',
                                    'status' => 'Sakit',
                                    'tanggal' => null,
                                    'wali_kelas_id' => '0b944161-2b82-35d5-959e-97d8257b44ff'
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'siswa_id' => ['Siswa ID field is required'],
                                    'kelas_id' => ['Kelas ID field is required'],
                                    'status' => ['Status field is required'],
                                    'tanggal' => ['Tanggal field is required']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'PUT',
                    'color' => 'yellow',
                    'endpoint' => '/api/kehadiran/{id}',
                    'description' => 'Update new kehadiran',
                    'parameters' => [
                        'siswa_id' => "uuid(required)",
                        'kelas_id' => "uuid(required)",
                        'status' => "string(required)",
                        'tanggal' => "date(required)"
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'Kehadiran update successfully',
                                'data' => [
                                    'id' => 1,
                                    'siswa_id' => '0a6fc2cd-f044-346d-8d1b-e2f782aec845',
                                    'kelas_id' => 'a8eb92ad-2781-3d56-863a-8790ce6906a5',
                                    'status' => 'Sakit',
                                    'tanggal' => null,
                                    'wali_kelas_id' => '0b944161-2b82-35d5-959e-97d8257b44ff'
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'siswa_id' => ['Siswa ID field is required'],
                                    'kelas_id' => ['Kelas ID field is required'],
                                    'status' => ['Status field is required'],
                                    'tanggal' => ['Tanggal field is required']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'DELETE',
                    'color' => 'red',
                    'endpoint' => '/api/kehadiran/{id}',
                    'description' => 'Delete kehadiran',
                    'parameters' => [
                        ''
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'Kehadiran delete successfully',
                                'data' => [
                                    'id' => 1,
                                    'siswa_id' => '0a6fc2cd-f044-346d-8d1b-e2f782aec845',
                                    'kelas_id' => 'a8eb92ad-2781-3d56-863a-8790ce6906a5',
                                    'status' => 'Sakit',
                                    'tanggal' => null,
                                    'wali_kelas_id' => '0b944161-2b82-35d5-959e-97d8257b44ff'
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'siswa_id' => ['Siswa ID field is required'],
                                    'kelas_id' => ['Kelas ID field is required'],
                                    'status' => ['Status field is required'],
                                    'tanggal' => ['Tanggal field is required']
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'jadwal' => [
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/jadwal',
                    'description' => 'Get all jadwal',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [
                                    [
                                        [
                                            "id" => "1bb9c53b-c351-3b5d-89fa-e1df20ac757c",
                                            "activity" => "Sit recusandae quisquam laboriosam omnis.",
                                            "date" => "2021-05-24 00:00:00",
                                            "start_time" => "06:29:19",
                                            "end_time" => "19:35:10",
                                            "is_active" => 1
                                        ],
                                        [
                                            "id" => "3392c543-44bb-3d11-a5ab-bb73ac9ebe0a",
                                            "activity" => "Incidunt voluptatibus exercitationem qui vel culpa commodi.",
                                            "date" => "1986-08-03 00:00:00",
                                            "start_time" => "05:11:00",
                                            "end_time" => "19:21:52",
                                            "is_active" => 1
                                        ]
                                    ]
                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'jadwal not found',
                                'error_code' => 'JADWAL_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/jadwal/{id}',
                    'description' => 'Get a specific jadwal',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [
                                    "id" => "3392c543-44bb-3d11-a5ab-bb73ac9ebe0a",
                                    "activity" => "Incidunt voluptatibus exercitationem qui vel culpa commodi.",
                                    "date" => "1986-08-03 00:00:00",
                                    "start_time" => "05:11:00",
                                    "end_time" => "19:21:52",
                                    "is_active" => 1
                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'kehadiran not found',
                                'error_code' => 'KEHADIRAN_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'POST',
                    'color' => 'blue',
                    'endpoint' => '/api/jadwal',
                    'description' => 'Create new jadwal',
                    'parameters' => [
                        'siswa_id' => "uuid(required)",
                        'kelas_id' => "uuid(required)",
                        'status' => "string(required)",
                        'tanggal' => "date(required)",
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'kehadiran created successfully',
                                'data' => [
                                    "id" => "3392c543-44bb-3d11-a5ab-bb73ac9ebe0a",
                                    "activity" => "Incidunt voluptatibus exercitationem qui vel culpa commodi.",
                                    "date" => "1986-08-03 00:00:00",
                                    "start_time" => "05:11:00",
                                    "end_time" => "19:21:52",
                                    "is_active" => 1
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'activity' => ['Activity field is required'],
                                    'date' => ['Date field is required'],
                                    'start_time' => ['Start time field is required'],
                                    'end_time' => ['End time field is required'],
                                    'is_active' => ['Is active field is required']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'PUT',
                    'color' => 'yellow',
                    'endpoint' => '/api/jadwal/{id}',
                    'description' => 'Update new jadwal',
                    'parameters' => [
                        'activity' => "string(required)",
                        'date' => "date(required)",
                        'start_time' => "time(required)",
                        'end_time' => "time(required)",
                        'is_active' => "boolean(required)"
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'Jadwal update successfully',
                                'data' => [
                                    'id' => 1,
                                    'activity' => 'Incidunt voluptatibus exercitationem qui vel culpa commodi.',
                                    'date' => '1986-08-03 00:00:00',
                                    'start_time' => '05:11:00',
                                    'end_time' => '19:21:52',
                                    'is_active' => 1
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'activity' => ['Activity field is required'],
                                    'date' => ['Date field is required'],
                                    'start_time' => ['Start time field is required'],
                                    'end_time' => ['End time field is required'],
                                    'is_active' => ['Is active field is required']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'DELETE',
                    'color' => 'red',
                    'endpoint' => '/api/jadwal/{id}',
                    'description' => 'Delete jadwal',
                    'parameters' => [
                        ''
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'Jadwal delete successfully',
                                'data' => [
                                    'id' => 1,
                                    'activity' => 'Incidunt voluptatibus exercitationem qui vel culpa commodi.',
                                    'date' => '1986-08-03 00:00:00',
                                    'start_time' => '05:11:00',
                                    'end_time' => '19:21:52',
                                    'is_active' => 1

                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'activity' => ['Activity field is required'],
                                    'date' => ['Date field is required'],
                                    'start_time' => ['Start time field is required'],
                                    'end_time' => ['End time field is required'],
                                    'is_active' => ['Is active field is required']
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'nilai_siswa' => [
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/nilai-siswa',
                    'description' => 'Get all nilai-siswa',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [
                                    [
                                        [
                                            "id" => "13951a6e-0011-3f64-b73d-5c4c92620105",
                                            "tugas" => 71,
                                            "uts" => 79,
                                            "uas" => 80,
                                            "rata_rata" => 77,
                                            "siswa" => [
                                                "id" => "5ee2109d-66e3-339b-835c-02dbe49f57f2",
                                                "nama_siswa" => "Gabriella Yolanda"
                                            ],
                                            "kelas" => [
                                                "id" => "505b385f-873b-312e-8044-f04567e5cace",
                                                "nama_kelas" => "Saadat Raihan Prasasta S.I.Kom"
                                            ],
                                            "pelajaran" => [
                                                "id" => "8d62122f-12fa-3195-9d73-7af6bb602ba2",
                                                "nama_pelajaran" => "Tasnim Hutasoit"
                                            ]
                                        ],
                                        [
                                            "id" => "14a07495-e26e-3f76-94e6-0ddb471bdd27",
                                            "tugas" => 86,
                                            "uts" => 88,
                                            "uas" => 90,
                                            "rata_rata" => 88,
                                            "siswa" => [
                                                "id" => "3d5559ff-357b-3ecb-88ca-4caa895cf408",
                                                "nama_siswa" => "Zelda Nuraini"
                                            ],
                                            "kelas" => [
                                                "id" => "c164c4fa-0a2c-3ab5-976d-e1823ad8756a",
                                                "nama_kelas" => "Diana Lestari"
                                            ],
                                            "pelajaran" => [
                                                "id" => "0924ff66-a1de-383f-aed1-f12a00cfd097",
                                                "nama_pelajaran" => "Zahra Hasanah"
                                            ]
                                        ]
                                    ]
                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'nilai not found',
                                'error_code' => 'NILAI_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'GET',
                    'color' => 'green',
                    'endpoint' => '/api/nilai-siswa/{id}',
                    'description' => 'Get a specific nilai-siswa',
                    'parameters' => [
                        'page' => 'integer (optional)',
                        'limit' => 'integer (optional)',
                        'search' => 'string (optional)'
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 200,
                            'body' => [
                                'data' => [
                                    "id" => "14a07495-e26e-3f76-94e6-0ddb471bdd27",
                                    "tugas" => 86,
                                    "uts" => 88,
                                    "uas" => 90,
                                    "rata_rata" => 88,
                                    "siswa" => [
                                        "id" => "3d5559ff-357b-3ecb-88ca-4caa895cf408",
                                        "nama_siswa" => "Zelda Nuraini"
                                    ],
                                    "kelas" => [
                                        "id" => "c164c4fa-0a2c-3ab5-976d-e1823ad8756a",
                                        "nama_kelas" => "Diana Lestari"
                                    ],
                                    "pelajaran" => [
                                        "id" => "0924ff66-a1de-383f-aed1-f12a00cfd097",
                                        "nama_pelajaran" => "Zahra Hasanah"
                                    ]
                                ],
                                'meta' => [
                                    'total' => 100,
                                    'page' => 1,
                                    'last_page' => 10
                                ]
                            ]
                        ],
                        'error' => [
                            'status' => 404,
                            'body' => [
                                'message' => 'nilai not found',
                                'error_code' => 'NILAI_NOT_FOUND'
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'POST',
                    'color' => 'blue',
                    'endpoint' => '/api/nilai-siswa',
                    'description' => 'Create new nilai-siswa',
                    'parameters' => [
                        'siswa_id' => "uuid(required)",
                        'kelas_id' => "uuid(required)",
                        'pelajaran_id' => "uuid(required)",
                        'tugas' => "integer(required)",
                        'uts' => "integer(required)",
                        'uas' => "integer(required)"
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'kehadiran created successfully',
                                'data' => [
                                    "id" => "14a07495-e26e-3f76-94e6-0ddb471bdd27",
                                    "tugas" => 86,
                                    "uts" => 88,
                                    "uas" => 90,
                                    "rata_rata" => 88,
                                    "siswa" => [
                                        "id" => "3d5559ff-357b-3ecb-88ca-4caa895cf408",
                                        "nama_siswa" => "Zelda Nuraini"
                                    ],
                                    "kelas" => [
                                        "id" => "c164c4fa-0a2c-3ab5-976d-e1823ad8756a",
                                        "nama_kelas" => "Diana Lestari"
                                    ],
                                    "pelajaran" => [
                                        "id" => "0924ff66-a1de-383f-aed1-f12a00cfd097",
                                        "nama_pelajaran" => "Zahra Hasanah"
                                    ]
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'siswa_id' => ['Siswa ID field is required'],
                                    'kelas_id' => ['Kelas ID field is required'],
                                    'pelajaran_id' => ['Pelajaran ID field is required'],
                                    'tugas' => ['Tugas field is required'],
                                    'uts' => ['UTS field is required'],
                                    'uas' => ['UAS field is required']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'PUT',
                    'color' => 'yellow',
                    'endpoint' => '/api/nilai-siswa/{id}',
                    'description' => 'Update new nilai-siswa',
                    'parameters' => [
                        'siswa_id' => "uuid(required)",
                        'kelas_id' => "uuid(required)",
                        'pelajaran_id' => "uuid(required)",
                        'tugas' => "integer(required)",
                        'uts' => "integer(required)",
                        'uas' => "integer(required)"

                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'Nilai siswa update successfully',
                                'data' => [
                                    'id' => 1,
                                    'siswa_id' => "3d5559ff-357b-3ecb-88ca-4caa895cf408",
                                    'kelas_id' => "c164c4fa-0a2c-3ab5-976d-e1823ad8756a",
                                    'pelajaran_id' => "0924ff66-a1de-383f-aed1-f12a00cfd097",
                                    'tugas' => 85,
                                    'uts' => 88,
                                    'uas' => 90,
                                    'rata_rata' => 87.6,
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'siswa_id' => ['Siswa ID field is required'],
                                    'kelas_id' => ['Kelas ID field is required'],
                                    'pelajaran_id' => ['Pelajaran ID field is required'],
                                    'tugas' => ['Tugas field is required'],
                                    'uts' => ['UTS field is required'],
                                    'uas' => ['UAS field is required']
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'method' => 'DELETE',
                    'color' => 'red',
                    'endpoint' => '/api/nilai-siswa/{id}',
                    'description' => 'Delete nilai siswa',
                    'parameters' => [
                        ''
                    ],
                    'responses' => [
                        'success' => [
                            'status' => 201,
                            'body' => [
                                'message' => 'Nilai siswa delete successfully',
                                'data' => [
                                    'id' => 1,
                                    'siswa_id' => "3d5559ff-357b-3ecb-88ca-4caa895cf408",
                                    'kelas_id' => "c164c4fa-0a2c-3ab5-976d-e1823ad8756a",
                                    'pelajaran_id' => "0924ff66-a1de-383f-aed1-f12a00cfd097",
                                    'tugas' => 85,
                                    'uts' => 88,
                                    'uas' => 90,
                                    'rata_rata' => 87.6,
                                ]
                            ]
                        ],
                        'validation_error' => [
                            'status' => 422,
                            'body' => [
                                'message' => 'Validation failed',
                                'errors' => [
                                    'siswa_id' => ['Siswa ID field is required'],
                                    'kelas_id' => ['Kelas ID field is required'],
                                    'pelajaran_id' => ['Pelajaran ID field is required'],
                                    'tugas' => ['Tugas field is required'],
                                    'uts' => ['UTS field is required'],
                                    'uas' => ['UAS field is required']
                                ]
                            ]
                        ]
                    ]
                ]
            ],
        ];
    }

    public static function getCommonResponses()
    {
        return [
            'unauthorized' => [
                'status' => 401,
                'body' => [
                    'message' => 'Unauthorized',
                    'error_code' => 'UNAUTHORIZED'
                ]
            ],
            'forbidden' => [
                'status' => 403,
                'body' => [
                    'message' => 'Forbidden',
                    'error_code' => 'FORBIDDEN'
                ]
            ],
            'server_error' => [
                'status' => 500,
                'body' => [
                    'message' => 'Internal server error',
                    'error_code' => 'SERVER_ERROR'
                ]
            ]
        ];
    }
}
