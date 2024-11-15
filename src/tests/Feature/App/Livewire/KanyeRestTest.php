<?php

namespace Tests\Feature\App\Livewire;

use App\Livewire\KanyeRest;
use App\Services\KanyeRestService;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;
use Mockery;

class KanyeRestTest extends TestCase
{
    private array $quotes;

    public function setUp(): void
    {
        parent::setUp();
        $this->quotes = ['test quote'];
    }

    public function testMount(): void
    {
        $kanyeRestMockService = Mockery::mock(KanyeRestService::class);
        $kanyeRestMockService->shouldReceive('getQuotes')->andReturn($this->quotes);
        app()->instance(KanyeRestService::class, $kanyeRestMockService);
        Livewire::test(KanyeRest::class)->assertSet('quotes', $this->quotes);
    }

    public function testUpdate()
    {
        $newQuotes = ['Updated quote'];
        $kanyeRestMockService = Mockery::mock(KanyeRestService::class);

        $kanyeRestMockService->shouldReceive('getQuotes')->andReturn($this->quotes);
        $kanyeRestMockService->shouldReceive('updateQuotes')->once()->andReturn($newQuotes);

        app()->instance(KanyeRestService::class, $kanyeRestMockService);

        Livewire::test(KanyeRest::class)
            ->call('update')
            ->assertSet('quotes', $newQuotes);
    }
}
