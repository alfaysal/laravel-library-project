<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_exampleee(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/api/v1/books',[
            "bookName" => "test book",
            "isbn" => 678,
            "is_hold" => 0
        ]);

        $response->assertStatus(200);
    }
}
