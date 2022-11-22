<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLGenerationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testURLCurrent()
    {
        $this->get("/url/current?name=aszaychik")
            ->assertSeeText("/url/current?name=aszaychik");
    }
    public function testURLNamed()
    {
        $this->get("/redirect/named")
            ->assertSeeText("/redirect/name/aszaychik");
    }
    public function testURLAction()
    {
        $this->get("/url/action")
            ->assertSeeText("/form");
    }
}
