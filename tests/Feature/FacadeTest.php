<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FacadeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testConfig()
    {
        $firstName1 = config("contoh.author.first");
        $firstName2 = Config::get("contoh.author.first");

        self::assertEquals($firstName1, $firstName2);
    }

    public function testConfigDepen()
    {
        $config = $this->app->make('config');
        $firstName = $config->get("contoh.author.first");

        $firstName1 = config("contoh.author.first");
        $firstName2 = Config::get("contoh.author.first");

        self::assertEquals($firstName1, $firstName2);
        self::assertEquals($firstName1, $firstName);
    }

    public function testConfigMock()
    {
        Config::shouldReceive('get')->with('contoh.author.first')->andReturn('As Zaychik');

        $firstname = Config::get('contoh.author.first');
        self::assertEquals('As Zaychik', $firstname);
    }
}
