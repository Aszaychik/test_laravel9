<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Crypt;
use function PHPUnit\Framework\assertEquals;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EncryptionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEncryption()
    {
        $encrypt = Crypt::encrypt("AsZaychik");
        var_dump($encrypt);
        $decrypt = Crypt::decrypt($encrypt);
        self::assertEquals("AsZaychik" , $decrypt);
    }
}
