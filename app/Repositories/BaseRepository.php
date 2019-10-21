<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    /**
     * A Model instance
     *
     * @var Model
     */
    protected $model;

    /**
     * Inject the Model in the BaseRepository
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    /**
     * All models
     *
     * @return Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Get a model by a given attribute.
     *
     * @param String $attribute
     * @param mixed $value
     * @return Collection
     */
    public function get(string $attribute, $value)
    {
        return $this->model->where($attribute, $value);
    }

    /**
     * Create a new Model
     *
     * @param Array $data
     * @return Model
     */
    public function create(Array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update a Model
     *
     * @param int $id
     * @param mixed $data
     * @return boolean
     */
    public function update(int $id, mixed $data)
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * Delete a model by its id.
     *
     * @param int $id
     * @return boolean
     */
    public function delete(int $id)
    {
        return $this->model->delete($id);
    }

}