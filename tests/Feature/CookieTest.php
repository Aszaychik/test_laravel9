<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateCookie()
    {
        $this->get('/cookie/set')
            ->assertSeeText("Hello Cookie")
            ->assertCookie("User-Id", "aszaychik")
            ->assertCookie('Is-Member', "true");
    }
    public function testGetCookie()
    {
        $this->withCookie("User-Id", "aszaychik")
            ->withCookie('Is-Member', "true")
            ->get('/cookie/get')
            ->assertJson([
                "User-Id" => "aszaychik",
                "Is-Member" => "true"
            ]);
    }
}
