<?php

namespace Modules\KanyeWest\tests\Unit\App\Http\Controllers\Api;

use Tests\TestCase;

class KanyeRestControllerTest extends TestCase
{
    public function testSuccessIndex()
    {
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . env('KANYE_API_TOKEN')])
            ->get(route('api.kanye.rest.index'));
        $response->assertStatus(200);
        $response->assertJsonStructure(['quotes' => []]);
    }

    public function testIndexWithoutToken()
    {
        $response = $this->get(route('api.kanye.rest.index'));
        $response->assertStatus(401);
        $response->assertJsonFragment(['errors' => ['KanyeRest service is unavailable']]);
    }

    public function testSuccessUpdate()
    {
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . env('KANYE_API_TOKEN')])
            ->get(route('api.kanye.rest.update'));
        $response->assertStatus(200);
        $response->assertJsonStructure(['quotes' => []]);
    }

    public function testUpdateWithoutToken()
    {
        $response = $this->get(route('api.kanye.rest.index'));
        $response->assertStatus(401);
        $response->assertJsonFragment(['errors' => ['KanyeRest service is unavailable']]);
    }
}
