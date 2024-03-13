<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Entity;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_data_by_category()
    {
        Category::factory()->create(['category' => 'Test']);
        Entity::factory()->create(['api' => 'Test API', 'category_id' => 1]);

        $response = $this->get('/api/Test');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'data' => [
                    '*' => ['api', 'description', 'link', 'category'],
                ],
            ]);
    }
}
