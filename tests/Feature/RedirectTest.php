<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RedirectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRedirectTo()
    {
        $this->get('/redirect/from')
            ->assertRedirect("/redirect/to");
    }
    public function testRedirectName()
    {
        $this->get('/redirect/name')
            ->assertRedirect("/redirect/name/aszaychik");
    }
    public function testRedirectAction()
    {
        $this->get('/redirect/action')
            ->assertRedirect("/redirect/name/aszaychik");
    }
    public function testRedirectAway()
    {
        $this->get('/redirect/away')
            ->assertRedirect("https://github.com/Aszaychik");
    }
}
