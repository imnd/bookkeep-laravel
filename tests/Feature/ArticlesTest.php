<?php

namespace Tests\Feature;

use Tests\TestCase,
    App\Models\Articles;

class ArticlesTest extends TestCase
{
    protected $modelName = 'Articles';

    /**
     * Авторизированные пользователи могут видеть товары
     * @test
     * @return void
     */
    public function authenticated_users_can_see_articles()
    {
        $this->listAuth();
    }

    /**
     * Авторизированные пользователи могут видеть товары
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_see_articles()
    {
        $this->listUnauth();
    }

    /**
     * Авторизированные пользователи могут видеть товары
     * @test
     * @return void
     */
    public function authenticated_users_can_update_article()
    {
        $this->updateAuth();
    }

    /**
     * Неавторизированные пользователи не могут видеть товары
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_update_article()
    {
        $this->updateUnauth();
    }

    /**
     * Авторизированные пользователи могут создавать товары
     * @test
     * @return void
     */
    public function authenticated_users_can_create_article()
    {
        $this->createAuth();
    }

    /**
     * Неавторизированные пользователи не могут создавать товары
     * @test
     */
    public function unauthenticated_users_cant_create_article()
    {
        $this->createUnauth();
    }

    /**
     * @inheritdoc
     */
    protected function getData(): array
    {
        $modelName = $this->getModelName();
        return [
            'subcat_id' => $this->faker->numberBetween(0, 10),
            'name' => $this->faker->text,
            'unit' => $modelName::getUnits()[0],
            'price' => $this->faker->numberBetween(100, 1000),
            'active' => $this->faker->numberBetween(0, 1),
        ];
    }
}
