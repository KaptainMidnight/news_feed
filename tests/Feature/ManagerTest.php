<?php

namespace Tests\Feature;

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManagerTest extends TestCase
{
    public function testUserCantViewMangerDashboardNotAuthorized(): void
    {
        $response = $this->get(route('manager.index'));

        $response->assertRedirect(route('login'));
    }

    public function testUserCanViewManagerDashboardAfterAuthorize(): void
    {
        auth()->loginUsingId(1);
        $response = $this->get(route('manager.index'));

        $response->assertOk();
    }

    public function testStoreNews(): void
    {
        $this->post(route('manager.store'), [
            'title' => 'test',
            'text' => 'test',
            'category_id' => 2,
        ]);

        $news = News::query()->where('title', 'test');
        $this->assertNotEmpty($news);
    }

    public function testCreateNewsPage(): void
    {
        auth()->loginUsingId(1);
        $response = $this->get(route('manager.create'));

        $response->assertOk();
    }

    public function testCreateNewsPageRedirectNotAuthorized(): void
    {
        $response = $this->get(route('manager.create'));

        $response->assertStatus(302);
    }

    public function testEditNewsPageRedirectNotAuthorized(): void
    {
        $response = $this->get(route('manager.edit', ['news' => 2]));

        $response->assertStatus(302);
    }

    public function testEditNewsPage(): void
    {
        auth()->loginUsingId(1);
        $response = $this->get(route('manager.edit', ['news' => 2]));

        $response->assertOk();
    }

    public function testUpdateNews(): void
    {
        $this->post(route('manager.update', 3), [
            'title' => 'test123',
            '_token' => csrf_token(),
        ]);

        $news = News::query()->where('title', 'test123');

        $this->assertNotEmpty($news);
    }
}
