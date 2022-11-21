<?php

namespace Tests\Feature;

use GuzzleHttp\Psr7\UploadedFile;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StorageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStorage()
    {
        $filesystem = Storage::disk("local");
        $filesystem->put("file.txt", "AsZaychik");
        $content = $filesystem->get("file.txt");

        self::assertEquals("AsZaychik", $content);
    }

    public function testPublic()
    {
        $filesystem = Storage::disk("public");
        $filesystem->put("file.txt", "AsZaychik");
        $content = $filesystem->get("file.txt");

        self::assertEquals("AsZaychik", $content);
    }



}
