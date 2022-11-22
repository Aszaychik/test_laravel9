<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testResponse(){
        $this->get("/response/hello")
            ->assertStatus(200)
            ->assertSeeText("Hello Response");
    }
    public function testHeader(){
        $this->get("/response/header")
            ->assertStatus(200)
            ->assertSeeText("As")
            ->assertSeeText("Zaychik")
            ->assertHeader("Content-Type", "application/json")
            ->assertHeader("Author","AsZaychik")
            ->assertHeader("App","Test Laravel");
    }

    public function testView()
    {
        $this->get("/response/type/view")
            ->assertSeeText("Hello AsZ");
    }
    public function testJson()
    {
        $this->get("/response/type/json")
            ->assertJson([
                "firstName" => "As",
                "lastName" => "Zaychik"
            ]);
    }

    public function testFile()
    {
        $this->get('/response/type/file')
            ->assertHeader("Content-Type", "image/png");
    }

    public function testDownload()
    {
        $this->get('/response/type/download')
            ->assertDownload("Onikata-Kayoko(potrait).png");
    }

}
