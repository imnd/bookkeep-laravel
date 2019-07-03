<?php

namespace Tests\Feature;

use Tests\TestCase,
    Illuminate\Foundation\Testing\WithFaker,
    App\Models\Articles
;

class ArticlesTest extends TestCase
{
    /**
     * Авторизированные пользователи могут создавать товары
     * @test
     * @return void
     */
    public function authenticated_users_can_create_article()
    {
        $this->assertEquals(0, Articles::count());
        $data = [
            'subcat_id' => $this->faker->numberBetween(0, 10),
            'name' => $this->faker->text,
            'unit' => Articles::getUnits()[0],
            'price' => $this->faker->numberBetween(100, 1000),
            'active' => $this->faker->numberBetween(0, 1),
        ];
        $this
            ->actingAs($this->user, 'api')
            ->postJson(route('api.articles.store'), $data)
            ->assertStatus(201);

        $this->assertEquals(1, Articles::count());

        $model = Articles::first();

        foreach (array_keys($data) as $key) {
            $this->assertEquals($data[$key], $model->$key);
        }
    }

    /**
     * Неавторизированные пользователи не могут создавать товары
     * @test
     */
    public function unauthenticated_users_cant_create_article()
    {
        $this->withExceptionHandling();

        $this->postJson(route('api.articles.store'))
            ->assertStatus(401);
    }
}
