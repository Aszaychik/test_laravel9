<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHelloController()
    {
        $this->get("/controller/hello/asz")
            ->assertSeeText("Halo asz");
    }

    public function testRequest(){
        $this->get("/controller/hello/request", [
            "Accept" => "plain/text"
        ])->assertSeeText("controller/hello/request")
            ->assertSeeText("http://localhost/controller/hello/request")
            ->assertSeeText("GET")
            ->assertSeeText("plain/text");
    }

    public function testInputRequest(){
        $this->get("/input/hello?name=aszaychik")
            ->assertSeeText("Hello aszaychik");
        $this->post("/input/hello", ["name" => "aszaychik"])
            ->assertSeeText("Hello aszaychik");
    }
    public function testNestedInputRequest(){
        $this->post("/input/hello/first",[
            "name" => [
                'first' => "as",
                "last" => "zaychik"
                ]
        ])
            ->assertSeeText("Hello as");
    }
    public function testMultiInput(){
        $this->post("/input/hello/input",[
            "name" => [
                'first' => "as",
                "last" => "zaychik"
                ]
        ])->assertSeeText("name")
            ->assertSeeText("first")
            ->assertSeeText("as")
            ->assertSeeText("zaychik");
    }
    public function testInputArray(){
        $this->post("/input/hello/array",[
            "products" => [
                [
                    "name" => "Infinix Note 12",
                    "price" => 25000000
                ],
                [
                    "name" => "Lenovo Ideapad 3",
                    "price" => 7300000
                ]
                ]
        ])->assertSeeText("Infinix Note 12")
            ->assertSeeText("Lenovo Ideapad 3");
    }

}
