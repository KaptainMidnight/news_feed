<?php

namespace Tests\Feature;

use App\Models\News;
use Tests\TestCase;

class NewsTest extends TestCase
{
    public function testNewsPageAvailable(): void
    {
        $response = $this->get(route('news.index'));

        $response->assertOk();
    }

    public function testCategoryNewsExists()
    {
        $response = $this->get(route('news.filter', 2));

        $response->assertOk();
    }

    public function testCategoryNewsNotExists()
    {
        $response = $this->get(route('news.filter', 9999));

        $response->assertNotFound();
    }

    public function testNewsExists()
    {
        $response = $this->get(route('news.show', 1));

        $response->assertOk();
    }

    public function testNewsNotExists()
    {
        $response = $this->get(route('news.show', 9999));

        $response->assertNotFound();
    }

    public function testNewsDatabaseNotEmpty()
    {
        $news = News::all();

        $this->assertNotEmpty($news);
    }
}
