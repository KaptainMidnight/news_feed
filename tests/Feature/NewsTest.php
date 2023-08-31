<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    use RefreshDatabase;

    public function testHomepageAvailable(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCategoryNewsExists()
    {
        $response = $this->get('/filter/2');

        $response->assertStatus(200);
    }

    public function testCategoryNewsNotExists()
    {
        $response = $this->get('/filter/9999');

        $response->assertStatus(404);
    }
}
