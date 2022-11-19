<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGet()
    {
        $this->get('/asz')
            ->assertStatus(200)
            ->assertSeeText('AsZaychik');
    }

    public function testRedirect()
    {
        $this->get('/github')
            ->assertRedirect('/asz');
    }

    public function testFallback()
    {
        $this->get('/404')
            ->assertSeeText('404');
    }
}
