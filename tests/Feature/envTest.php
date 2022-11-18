<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use Tests\TestCase;

class envTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $envYoutube = env("YOUTUBE");

        self::assertEquals("As Zaychik", $envYoutube);
    }

    public function testEnv()
    {
        $author = Env::get('AUTHOR', 'As Zaychik');

        self::assertEquals("As Zaychik", $author);

    }
}
