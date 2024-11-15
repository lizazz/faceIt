<?php

namespace Modules\KanyeWest\App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Modules\KanyeWest\App\Services\KanyeWestApiService;

readonly class KanyeRestController
{
    public function __construct(private KanyeWestApiService $apiService) {}

    public function index(): JsonResponse
    {
        $quotes = $this->apiService->getQuotes();

        if (!isset($quotes['quotes'])) {
            $quotes = $this->apiService->updateQuotes();
        }

        return response()->json(['quotes' => $quotes]);
    }

    public function update(): JsonResponse
    {
        $quotes = $this->apiService->updateQuotes();

        return response()->json(['quotes' => $quotes]);
    }
}
