<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MiddlewareTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMiddlewareInvalid()
    {
        $this->get('/middleware/api')
            ->assertStatus(401)
            ->assertSeeText("Access Denied");
    }
    public function testMiddlewareValid()
    {
        $this->withHeader("X-API-KEY", 'ASZ')
            ->get('/middleware/api')
            ->assertStatus(200)
            ->assertSeeText("OK");
    }
    public function testMiddlewareGroupInvalid()
    {
        $this->get('/middleware/group')
            ->assertStatus(401)
            ->assertSeeText("Access Denied");
    }
    public function testMiddlewareGroupValid()
    {
        $this->withHeader("X-API-KEY", 'ASZ')
            ->get('/middleware/group')
            ->assertStatus(200)
            ->assertSeeText("GROUP");
    }
}
