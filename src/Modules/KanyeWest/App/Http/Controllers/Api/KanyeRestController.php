<?php

namespace Modules\KanyeWest\App\Http\Controllers\Api;

use Illuminate\Support\Facades\Http;

class KanyeRestController
{
    public function index()
    {
        return response()->json(['text' => ['test']]);
    }

    public function index2()
    {
        $response = Http::get('http://laravel.test/api/v1/kanye-rest')->json();
        return $response->json();
    }
}
