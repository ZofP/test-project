<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_users_can_get_articles_list()
    {

        // create a user

        $user = User::factory()->create();

        // authenticate the user

        $this->actingAs($user);

        // call the /api/articles api endpoint with GET method

        $response = $this->get('/api/articles');

        // request status was 200 (success)

        $response->assertStatus(200);

    }

    public function test_user_can_create_new_article()
    {
        // create a user

        $user = User::factory()->create();

        // authenticate the user

        $this->actingAs($user);

        // call the /api/articles api endpoint with POST method

        $article = Article::factory()->make();

        $response = $this->post('/api/articles', $article->toArray());

        // request status was 200 (success)

        $response->assertStatus(200);

        // find the article that was added in the database

        $article_added = Article::first();

        // we should find only one entry in the database

        $this->assertEquals(1, Article::count());

        // the added article has the proper data based on the input

        $this->assertEquals($article->title, $article_added->title);
        $this->assertEquals($article->text, $article_added->text);
        $this->assertEquals($user->id, $article_added->user_id);

        $this->assertInstanceOf(User::class, $article_added->user);

    }

    public function test_user_can_update_article()
    {
        // create a user

        $user = User::factory()->create();

        // authenticate the user

        $this->actingAs($user);

        // create an existing article

        $article = Article::factory()->existing()->create();

        // create random update data from the article factory, persist the article_id;

        $update_data = Article::factory()->make(['article_id' => $article->id]);

        // call the /api/articles/{articleId} api endpoint with PUT method

        $response = $this->put("/api/articles/{$article->id}", $update_data->toArray());

        // request status was 200 (success);

        $response->assertStatus(200);

        // find the edited article in the database

        $article_edited = Article::first();

        // we should find only one entry in the database

        $this->assertEquals(1, Article::count());

        // the edited article has the proper data based on the input

        $this->assertEquals($update_data->title, $article_edited->title);
        $this->assertEquals($update_data->text, $article_edited->text);
        $this->assertEquals($update_data->article_id, $article_edited->id);

        $this->assertInstanceOf(User::class, $article_edited->user);

    }

    public function test_user_can_see_article_detail()
    {
        // create a user

        $user = User::factory()->create();

        // authenticate the user

        $this->actingAs($user);

        // create an existing article

        $article = Article::factory()->existing()->create();

        // call the /api/articles/{articleId} api endpoint with GET method

        $response = $this->get("/api/articles/{$article->id}");

        // request status was 200 (success);

        $response->assertStatus(200);

    }

}
