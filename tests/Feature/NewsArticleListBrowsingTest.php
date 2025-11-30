<?php

namespace Tests\Feature;

use App\Models\NewsArticle;
use App\Models\User;
use Database\Seeders\NewsArticleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsArticleListBrowsingTest extends TestCase
{
    use RefreshDatabase;

    public function test_published_news_articles_list_page_can_be_rendered(): void
    {
        $response = $this->get(route('news'));

        $response->assertStatus(200);
    }

    public function test_user_can_read_a_specific_news_article(): void
    {
        $this->seed(NewsArticleSeeder::class);

        $news_article = NewsArticle::all()->first();
        User::factory()->create(['id' => $news_article->author_id]);

        $this->get(route('news_article', ['newsArticle' => $news_article->id]))
            ->assertStatus(200)
            ->assertSee([$news_article->title, $news_article->body, $news_article->category]);
    }
}
