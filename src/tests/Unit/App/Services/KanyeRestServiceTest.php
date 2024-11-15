<?php

namespace Tests\Unit\App\Services;

use App\Services\KanyeRestService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class KanyeRestServiceTest extends TestCase
{
    private KanyeRestService $kanyeRestService;

    public function setUp(): void
    {
        parent::setUp();
        $this->kanyeRestService = new KanyeRestService();
    }
    public function testSuccessUpdateQuotes()
    {
        Http::fake([
            env('KANYE_API'). 'kanye-rest/update' => Http::response(['quotes' => ['test quotes']])
        ]);
        $response = $this->kanyeRestService->updateQuotes();
        $this->assertEquals(['test quotes'], $response);
    }

    public function testFailedUpdateQuotes()
    {
        Http::fake([
            env('KANYE_API'). 'kanye-rest/update' => Http::response(['errors' => ['something went wrong']])
        ]);
        $response = $this->kanyeRestService->updateQuotes();
        $this->assertEquals(['something went wrong'], $response);
    }

    public function testSuccessGetQuotes()
    {
        Http::fake([
            env('KANYE_API') . 'kanye-rest' => Http::response(['quotes' => ['test quotes']])
        ]);
        $response = $this->kanyeRestService->getQuotes();
        $this->assertEquals(['test quotes'], $response);
    }

    public function testFailedGetQuotes()
    {
        Http::fake([
            env('KANYE_API') . 'kanye-rest' => Http::response(['errors' => ['something went wrong']])
        ]);
        $response = $this->kanyeRestService->getQuotes();
        $this->assertEquals(['something went wrong'], $response);
    }

    public function testSuccessUpdateView()
    {
        $kanyeRestService = new KanyeRestService();
        $reflection = new \ReflectionClass($kanyeRestService);
        $method = $reflection->getMethod('updateView');
        $method->setAccessible(true);
        $response = $method->invoke($kanyeRestService, ['quotes' => ['test quotes']]);
        $this->assertEquals(['test quotes'], $response);
    }

    public function testErrorUpdateView()
    {
        $kanyeRestService = new KanyeRestService();
        $reflection = new \ReflectionClass($kanyeRestService);
        $method = $reflection->getMethod('updateView');
        $method->setAccessible(true);
        $response = $method->invoke($kanyeRestService, ['errors' => ['server error']]);
        $this->assertEquals(['server error'], $response);
    }

    public function testUnknownErrorUpdateView()
    {
        $kanyeRestService = new KanyeRestService();
        $reflection = new \ReflectionClass($kanyeRestService);
        $method = $reflection->getMethod('updateView');
        $method->setAccessible(true);
        $response = $method->invoke($kanyeRestService, ['not array']);
        $this->assertEquals(['unknown error'], $response);
    }
}
