<?php

namespace Tests\Feature;

use App\Models\WebPage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        // WebPageEnum::HOME->value = 1
        WebPage::factory()->state(['id' => 1])->create();

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test that home page loads after first record is created.
     */
    public function test_home_page_loads_after_first_record_is_created(): void
    {
        // Pred vytvorením záznamu – očakávame 404
        $this->get('/')->assertStatus(404);

        // Vytvoríme prvý záznam s id = 1
        WebPage::factory()->state(['id' => 1])->create();

        // Po vytvorení – očakávame 200
        $this->get('/')->assertStatus(200);
    }
}
