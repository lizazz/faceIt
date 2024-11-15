<?php

namespace Modules\KanyeWest\App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class KanyeWestApiService
{
    public function updateQuotes(): array
    {
        $quotes = [];

        while (count($quotes) < 5) {
            $response = Http::get(env('KANYE_REST_API'))->json();

            if ($response['quote']) {
                $quotes[] = $response['quote'];
            } else {
                return ['errors' => ['no connection with api.kanye.rest']];
            }
        }

        Redis::set('quotes', json_encode($quotes));

        return $quotes;
    }

    public function getQuotes(): array
    {
        $quotesString = Redis::get('quotes');

        if($quotesString){
            $quotes = json_decode($quotesString);

            if (count($quotes) === 5) {
                return $quotes;
            }
        }

        return [];
    }
}
