<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    /**
     * model property on class instances
     * @var array $model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all instances of model
     * 
     * @return array
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * create a new record in the database
     * 
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * update record in the database
     * 
     * @param array $data
     * @param mixed $id
     * @return void
     */
    public function update(array $data, $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    /**
     * remove record from the database
     * 
     * @param mixed $id
     * @return boolean
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * show the record with the given id
     * 
     * @param mixed $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->model-findOrFail($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
