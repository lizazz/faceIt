<?php

namespace Modules\KanyeWest\tests\Unit\App\Http\Controllers;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KanyeWestControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    private User $user;
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function testSuccessFlow()
    {
        $this->actingAs($this->user);
        $response = $this->get(route('kanyewest.index'));
        $response->assertStatus(200);
        $response->assertViewIs('kanyewest::index');
    }

    /** check if we have redirect on login if user has been not logged*/
    public function testFailureFlow()
    {
        $response = $this->get(route('kanyewest.index'));
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }
}
