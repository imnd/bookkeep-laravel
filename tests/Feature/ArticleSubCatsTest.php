<?php

namespace Tests\Feature;

use Tests\TestCase;

class ArticleSubcatsTest extends TestCase
{
    /**
     * @inheritdoc
     */
    protected $modelName = 'ArticleSubcats';

    /**
     * Авторизированные пользователи могут видеть подкатегории товаров
     * @test
     * @return void
     */
    public function authenticated_users_can_see_article_subcats()
    {
        $this->listAuth();
    }

    /**
     * Авторизированные пользователи могут видеть подкатегории товаров
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_see_article_subcats()
    {
        $this->listUnauth();
    }

    /**
     * Авторизированные пользователи могут создавать подкатегории товаров
     * @test
     * @return void
     */
    public function authenticated_users_can_create_article_subcat()
    {
        $this->createAuth();
    }

    /**
     * Неавторизированные пользователи не могут создавать подкатегории товаров
     * @test
     */
    public function unauthenticated_users_cant_create_article_subcat()
    {
        $this->createUnauth();
    }

    /**
     * Авторизированные пользователи могут видеть подкатегории товаров
     * @test
     * @return void
     */
    public function authenticated_users_can_update_article_subcat()
    {
        $this->updateAuth();
    }

    /**
     * Неавторизированные пользователи не могут видеть подкатегории товаров
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_update_article_subcat()
    {
        $this->updateUnauth();
    }

    /**
     * @inheritdoc
     */
    protected function getData(): array
    {
        return [
            'cat_id' => $this->faker->numberBetween(0, 10),
            'name' => $this->faker->text,
        ];
    }
}
