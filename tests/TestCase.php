<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase,
    Illuminate\Foundation\Testing\WithFaker,
    Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase, CreatesApplication, WithFaker;

    /**
     * @var string
     */
    protected $modelName;
    /**
     * @var \App\Models\Users
     */
    protected $user;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory('App\Models\Users')->create();
        $this->withoutExceptionHandling();
    }

    /**
     * Авторизированные пользователи могут видеть список моделей
     * 
     * @param string $modelName
     * @return void
     */
    protected function listAuth()
    {
        $num = 10;
        for ($i=0; $i<$num; $i++) {
            factory($this->getModelName())->create();
        }
        $route = route($this->getRoute('list'));
        $content = $this
            ->actingAs($this->user, 'api')
            ->get($route)
            ->decodeResponseJson();

        $this->assertCount($num, $content['data']);
        $this
            ->actingAs($this->user, 'api')
            ->get($route)
            ->assertStatus(200);
    }

    /**
     * Авторизированные пользователи могут видеть список моделей
     * 
     * @param string $modelName
     * @return void
     */
    protected function listUnauth()
    {
        $this->withExceptionHandling();

        $this
            ->get(route($this->getRoute('list')))
            ->assertStatus(302);
    }

    /**
     * Авторизированные пользователи могут видеть список моделей
     * 
     * @param string $modelName
     * @return void
     */
    protected function createAuth()
    {
        $modelName = '\\' . $this->getModelName();
        $this->assertEquals(0, $modelName::count());
        $data = $this->getData();
        $this
            ->actingAs($this->user, 'api')
            ->postJson(route($this->getRoute('store')), $data)
            ->assertStatus(201);

        $this->assertEquals(1, $modelName::count());

        $model = $modelName::first();
        $this->checkModel($model, $data);
    }

    /**
     * Неавторизированные пользователи не могут видеть список моделей
     * 
     * @param string $modelName
     * @return void
     */
    protected function createUnauth()
    {
        $this->withExceptionHandling();

        $this->postJson(route($this->getRoute('store')))
            ->assertStatus(401);
    }

    /**
     * Авторизированные пользователи могут редактировать модели
     * 
     * @param string $modelName
     * @return void
     */
    protected function updateAuth()
    {
        $model = factory($this->getModelName())->create();
        $data = $this->getData();
        $this
            ->actingAs($this->user, 'api')
            ->postJson(route($this->getRoute('update'), $model), $data)
            ->assertStatus(200);

        $model = $model->fresh();
        $this->checkModel($model, $data);
    }

    /**
     * Неавторизированные пользователи не могут редактировать модели
     * 
     * @param string $modelName
     * @return void
     */
    protected function updateUnauth()
    {
        $this->withExceptionHandling();

        $model = factory($this->getModelName())->create();
        $this
            ->postJson(route($this->getRoute('update'), $model))
            ->assertStatus(401);
    }

    /**
     * Данные для создания модели
     * @return array
     */
    abstract protected function getData(): array;

    /**
     * @return string
     */
    protected function getModelName()
    {
        return "App\\Models\\{$this->modelName}";
    }

    /**
     * @param string $action
     * @param boolean $api
     * @return string
     */
    protected function getRoute($action, $api = true)
    {
        return ($api ? 'api.' : '') . lcfirst($this->modelName) . ".$action";
    }

    /**
     * Проверяем сохранились ли данные модели
     * 
     * @param array $model модель
     * @param array $data данные
     * @return void
     */
    protected function checkModel($model, $data)
    {
        $fields = array_keys($data);
        unset($fields[array_search('rows', $fields)]);
        foreach ($fields as $key) {
            $this->assertEquals($data[$key], $model->$key);
        }
    }
}
