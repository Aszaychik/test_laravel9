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

    public function testRouteParams()
    {
        $this->get('/products/1')
            ->assertSeeText('Product 1');

        $this->get('/products/2')
            ->assertSeeText('Product 2');

        $this->get('/products/1/items/xxx')
            ->assertSeeText('Product 1, Item xxx');

        $this->get('/products/2/items/yyy')
            ->assertSeeText('Product 2, Item yyy');
    }

    public function testRouteParamsRegex()
    {
        $this->get('/categories/2')
            ->assertSeeText('Category 2');

        $this->get('/categories/asz')
            ->assertSeeText('404');

        $this->get("/categories/100")
            ->assertSeeText('404');
    }

    public function testRouteParamsOption()
    {
        $this->get("/users/")->assertSeeText("User 404");
    }

    public function testRouteParamsConflict()
    {
        $this->get("/conflict/aszaychik")
            ->assertSeeText("Conflict aszaychik");

        $this->get("/conflict/as")
            ->assertSeeText("Conflict aszaychik");
    }
}
