<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateSession()
    {
        $this->get('/session/create')
        ->assertSeeText("OK")
        ->assertSessionHas("userId", "aszaychik")
        ->assertSessionHas("isMember", true);
    }

    public function testGetSession()
    {
        $this->withSession([
            "userId" => 'aszaychik',
            "isMember" => true
        ])->get("session/get")
            ->assertSeeText("User Id : aszaychik, Is Member : 1");

    }

    public function testGetWithoutSession()
    {
        $this->withSession([])->get("session/get")
            ->assertSeeText("User Id : guest, Is Member : ");
    }
}
