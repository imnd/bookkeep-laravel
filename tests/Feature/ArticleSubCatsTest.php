<?php

namespace Tests\Feature;

use Tests\TestCase,
    Illuminate\Foundation\Testing\WithFaker,
    App\Models\ArticleSubcats;

class ArticleSubcatsTest extends TestCase
{
    /**
     * Авторизированные пользователи могут создавать подкатегории товаров
     * @test
     * @return void
     */
    public function authenticated_users_can_create_article_cat()
    {
        $this->assertEquals(0, ArticleSubcats::count());
        $data = [
            'cat_id' => 1,
            'name' => 'Title',
        ];
        $this
            ->actingAs($this->user, 'api')
            ->postJson(route('api.articleSubcats.store'), $data)
            ->assertStatus(201);

        $this->assertEquals(1, ArticleSubcats::count());

        $model = ArticleSubcats::first();
        foreach (array_keys($data) as $key) {
            $this->assertEquals($data[$key], $model->$key);
        }
    }

    /**
     * Неавторизированные пользователи не могут создавать подкатегории товаров
     * @test
     */
    public function unauthenticated_users_cant_create_article_cat()
    {
        $this->withExceptionHandling();

        $this->postJson(route('api.articleSubcats.store'))
            ->assertStatus(401);
    }
}
