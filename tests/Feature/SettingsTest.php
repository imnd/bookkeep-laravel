<?php

namespace Tests\Feature;

use Tests\TestCase;

class SettingsTest extends TestCase
{
    /**
     * @inheritdoc
     */
    protected $modelName = 'Settings';

    /**
     * Авторизированные пользователи могут видеть настройки
     * @test
     * @return void
     */
    public function authenticated_users_can_see_settings()
    {
        $this->listAuth();
    }

    /**
     * Авторизированные пользователи могут видеть настройки
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_see_settings()
    {
        $this->listUnauth();
    }

    /**
     * Авторизированные пользователи могут создавать настройки
     * @test
     * @return void
     */
    public function authenticated_users_can_create_settings()
    {
        $this->createAuth();
    }

    /**
     * Неавторизированные пользователи не могут создавать настройки
     * @test
     */
    public function unauthenticated_users_cant_create_settings()
    {
        $this->createUnauth();
    }

    /**
     * Авторизированные пользователи могут видеть настройки
     * @test
     * @return void
     */
    public function authenticated_users_can_update_settings()
    {
        $this->updateAuth();
    }

    /**
     * Неавторизированные пользователи не могут видеть настройки
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_update_settings()
    {
        $this->updateUnauth();
    }

    /**
     * @inheritdoc
     */
    protected function getData(): array
    {
        return [
            'name' => $this->faker->name,
            'key' => $this->faker->text,
            'value' => $this->faker->text,
        ];
    }
}
