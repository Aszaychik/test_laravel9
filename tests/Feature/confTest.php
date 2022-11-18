<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class confTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $firstName = config('contoh.author.first');
        $lastName = config('contoh.author.last');
        $email = config('contoh.email');
        $github = config('contoh.github');

        self::assertEquals('As',$firstName);
        self::assertEquals('Zaychik',$lastName);
        self::assertEquals('aszaychik@gmail.com',$email);
        self::assertEquals('https://github.com/Aszaychik',$github);
    }
}
