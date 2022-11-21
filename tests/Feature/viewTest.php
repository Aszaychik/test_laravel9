<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class viewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/hello')
            ->assertSeeText('Hello AsZaychik');

        $this->get('/hello-again')
            ->assertSeeText('Hello AsZaychik');
    }
    public function testNested()
    {
        $this->get('/hello-world')
            ->assertSeeText('World AsZaychik');
    }

    public function testViewWithoutRoute()
    {
        $this->view('hello', ['name' => 'AsZaychik'])
            ->assertSeeText('Hello AsZaychik');

        $this->view('hello.world', ['name' => 'AsZaychik'])
            ->assertSeeText('World AsZaychik');
    }
}
