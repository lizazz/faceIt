<?php

namespace App\Livewire;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class KanyeRest extends Component
{
    public $quotes = [];

    public function update()
    {
        $this->mount();
    }

    public function mount()
    {
       // $client = new Client(['timeout' => 6]);
       // $response = $client->get('https://api.kanye.rest');
      //  $this->quotes = json_decode($response->getBody()->getContents(), true);
        $response = Http::get('http://laravel.test/api/v1/kanye-rest')->json();
        dd($response->json());
    }

    public function render()
    {
        return view('livewire.kanye-rest');
    }
}
