<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FileControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpload()
    {
        $picture = UploadedFile::fake()->image("AsZaychik.png");
        $this->post("/file/upload", [
            "picture" => $picture
        ])->assertSeeText("OK AsZaychik.png");
    }

}
