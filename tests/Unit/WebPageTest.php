<?php

namespace Tests\Unit;

use App\Enums\WebPageEnum;
use App\Models\WebPage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WebPageTest extends TestCase
{
    use RefreshDatabase;

    // --- Factory & fillable ---

    public function test_can_create_web_page_via_factory(): void
    {
        $webPage = WebPage::factory()->create();

        $this->assertDatabaseHas('web_pages', ['id' => $webPage->id]);
    }

    public function test_fillable_fields(): void
    {
        $webPage = WebPage::factory()->create([
            'title' => 'Test Title',
            'description' => 'Test description',
            'content' => 'Test content',
            'lang' => 'sk',
        ]);

        $this->assertEquals('Test Title', $webPage->title);
        $this->assertEquals('Test description', $webPage->description);
        $this->assertEquals('Test content', $webPage->content);
        $this->assertEquals('sk', $webPage->lang);
    }

    // --- Scope parents ---

    public function test_scope_parents_returns_only_root_pages(): void
    {
        $parent = WebPage::factory()->create(['parent_id' => null]);
        $child = WebPage::factory()->create(['parent_id' => $parent->id]);

        $parents = WebPage::parents()->get();

        $this->assertTrue($parents->contains($parent));
        $this->assertFalse($parents->contains($child));
    }

    // --- Vzťah parent/child ---

    public function test_parent_relation(): void
    {
        $parent = WebPage::factory()->create();
        $child = WebPage::factory()->create(['parent_id' => $parent->id]);

        $this->assertEquals($parent->id, $child->parent->id);
    }

    public function test_child_has_no_parent_when_root(): void
    {
        $page = WebPage::factory()->create(['parent_id' => null]);

        $this->assertNull($page->parent);
    }

    // --- Vzťah articles ---

    public function test_articles_relation_exists(): void
    {
        $webPage = WebPage::factory()->create();

        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\BelongsToMany::class,
            $webPage->articles()
        );
    }

    // --- WebPageEnum ---

    public function test_web_page_enum_home_value(): void
    {
        $this->assertEquals(1, WebPageEnum::HOME->value);
    }

    public function test_web_page_enum_vehicles_value(): void
    {
        $this->assertEquals(2, WebPageEnum::VEHICLES->value);
    }

    public function test_find_home_page_by_enum(): void
    {
        WebPage::factory()->state(['id' => 1])->create();

        $page = WebPage::findOrFail(WebPageEnum::HOME->value);

        $this->assertEquals(WebPageEnum::HOME->value, $page->id);
    }
}
