<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class KanyeRestService
{
    public function updateQuotes(): array
    {
        $response = Http::withHeaders(['Authorization' => 'Bearer ' . env('KANYE_API_TOKEN')])
            ->get(env('KANYE_API') . 'kanye-rest/update')
            ->json();

        return $this->updateView($response);
    }

    public function getQuotes(): array
    {
        $response = Http::withHeaders(['Authorization' => 'Bearer ' . env('KANYE_API_TOKEN')])
            ->get(env('KANYE_API') . 'kanye-rest')
            ->json();

        return $this->updateView($response);
    }

    private function updateView($response): array
    {
        if (is_array($response)) {
            if (isset($response['quotes'])) {
                return $response['quotes'];
            } elseif (isset($response['errors'])) {
                return $response['errors'];
            }
        }

        return ['unknown error'];
    }
}
