<?php
namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Get all of the models from the database.
     * 
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function selectAll();

    /**
     * Find a model by its primary key.
     * 
     * @param mixed $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function find($id);

    /**
     * Begin querying the model.
     */
    public function query();

    /**
     * Create new model and save in DB
     * 
     * @param array $data
     * @return boolean
     */
    public function create(array $data);
}
