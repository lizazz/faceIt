<?php

namespace App\Livewire;

use App\Services\KanyeRestService;
use Illuminate\View\View;
use Livewire\Component;

class KanyeRest extends Component
{
    public $quotes = [];
    private KanyeRestService $kanyeRestService;

    public function __construct()
    {
        $this->kanyeRestService = app()->make(KanyeRestService::class);
    }

    public function update(): void
    {
        $this->quotes = $this->kanyeRestService->updateQuotes();
    }

    public function mount(): void
    {
        $this->quotes = $this->kanyeRestService->getQuotes();
    }

    public function render(): View
    {
        return view('livewire.kanye-rest');
    }


}
