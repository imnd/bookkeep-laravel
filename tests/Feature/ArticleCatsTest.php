<?php

namespace Tests\Feature;

use Tests\TestCase;

class ArticleCatsTest extends TestCase
{
    protected $modelName = 'ArticleCats';

    /**
     * Авторизированные пользователи могут видеть категории товаров
     * @test
     * @return void
     */
    public function authenticated_users_can_see_article_cats()
    {
        $this->listAuth();
    }

    /**
     * Авторизированные пользователи могут видеть категории товаров
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_see_article_cats()
    {
        $this->listUnauth();
    }

    /**
     * Авторизированные пользователи могут создавать категории товаров
     * @test
     * @return void
     */
    public function authenticated_users_can_create_article_cat()
    {
        $this->createAuth();
    }

    /**
     * Неавторизированные пользователи не могут создавать категории товаров
     * @test
     */
    public function unauthenticated_users_cant_create_article_cat()
    {
        $this->createUnauth();
    }

    /**
     * Авторизированные пользователи могут видеть категории товаров
     * @test
     * @return void
     */
    public function authenticated_users_can_update_article_cat()
    {
        $this->updateAuth();
    }

    /**
     * Неавторизированные пользователи не могут видеть категории товаров
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_update_article_cat()
    {
        $this->updateUnauth();
    }

    /**
     * @inheritdoc
     */
    protected function getData(): array
    {
        return [
            'name' => $this->faker->text,
            'description' => $this->faker->text,
        ];
    }
}
