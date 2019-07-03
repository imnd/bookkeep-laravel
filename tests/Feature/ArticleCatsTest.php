<?php

namespace Tests\Feature;

use Tests\TestCase,
    Illuminate\Foundation\Testing\WithFaker,
    App\Models\ArticleCats;

class ArticleCatsTest extends TestCase
{
    /**
     * Авторизированные пользователи могут создавать категории товаров
     * @test
     * @return void
     */
    public function authenticated_users_can_create_article_cat()
    {
        $this->assertEquals(0, ArticleCats::count());
        $data = [
            'name' => $this->faker->text,
            'description' => $this->faker->text,
        ];
        $this
            ->actingAs($this->user, 'api')
            ->postJson(route('api.articleCats.store'), $data)
            ->assertStatus(201);

        $this->assertEquals(1, ArticleCats::count());

        $model = ArticleCats::first();
        $this->assertEquals($data['name'], $model->name);
        $this->assertEquals($data['description'], $model->description);
    }

    /**
     * Неавторизированные пользователи не могут создавать категории товаров
     * @test
     */
    public function unauthenticated_users_cant_create_article_cat()
    {
        $this->withExceptionHandling();

        $this->postJson(route('api.articleCats.store'))
            ->assertStatus(401);
    }
}
