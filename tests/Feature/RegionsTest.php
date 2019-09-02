<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegionsTest extends TestCase
{
    /**
     * @inheritdoc
     */
    protected $modelName = 'Regions';

    /**
     * Авторизированные пользователи могут видеть районы
     * @test
     * @return void
     */
    public function authenticated_users_can_see_regions()
    {
        $this->listAuth();
    }

    /**
     * Авторизированные пользователи могут видеть районы
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_see_regions()
    {
        $this->listUnauth();
    }

    /**
     * Авторизированные пользователи могут создавать районы
     * @test
     * @return void
     */
    public function authenticated_users_can_create_region()
    {
        $this->createAuth();
    }

    /**
     * Неавторизированные пользователи не могут создавать районы
     * @test
     */
    public function unauthenticated_users_cant_create_region()
    {
        $this->createUnauth();
    }

    /**
     * Авторизированные пользователи могут видеть районы
     * @test
     * @return void
     */
    public function authenticated_users_can_update_region()
    {
        $this->updateAuth();
    }

    /**
     * Неавторизированные пользователи не могут видеть районы
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_update_region()
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
