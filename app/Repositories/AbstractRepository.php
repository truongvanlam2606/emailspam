<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var Illuminate\Database\Eloquent\Model;
     */
    protected $model;

    /**
     * Construct function
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Abstract public function
     *
     * @return void
     */
    abstract public function makeModel();

    /**
     * Set model
     *
     * @return void
     */
    public function setModel()
    {
        $this->model = app()->make($this->makeModel());
    }

    /**
     * get model
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get instance model
     *
     */
    public function getInstance()
    {
        return $this->model;
    }

    /**
     * Undocumented function
     *
     * @param array  $creatials creatials
     * @param array  $relations relations
     * @param string $orderSort orderSort
     * @param string $orderBy   orderBy
     * @param array  $select    select
     *
     * @return Collection
     */
    public function getAll(array $creatials = [], $relations = [], string $orderSort = 'id', string $orderBy = 'ASC', array $select = ['*'])
    {
        return $this->model
                    ->with($relations)
                    ->where($creatials)
                    ->select($select)
                    ->orderBy($orderSort, $orderBy)
                    ->get();
    }

    /**
     * Find model
     *
     * @param integer $id        id
     * @param array   $relations relations
     * @param array   $select    select
     *
     * @return Model
     */
    public function find(int $id, $relations = [], array $select = ['*'])
    {
        return $this->model
                ->with($relations)
                ->select($select)
                ->find($id);
    }

    /**
     * Create function
     *
     * @param array $data data
     *
     * @return Model
     */
    public function create(array $data)
    {
        $this->model->fill($data);
        $this->model->save();
        return $this->model;
    }

    /**
     * Update function
     *
     * @param integer|Model $input input
     * @param array         $data  data
     *
     * @return Model
     */
    public function update($input, array $data)
    {
        $model = $input;
        if (!($input instanceof Model)) {
            $model = $this->findOrFail($input);
        }
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * Restore function
     *
     * @param integer $id id
     *
     * @return void
     */
    public function restore(int $id)
    {
        $model = $this->findOrFailWithTrashed($id);
        return $model->restore();
    }

    /**
     * Delete function
     *
     * @param integer $id id
     *
     * @return void
     */
    public function delete(int $id)
    {
        $model = $this->findOrFail($id);
        return $model->delete();
    }

    /**
     * Force delete
     *
     * @param integer $id id
     *
     * @return void
     */
    public function forceDelete(int $id)
    {
        return $this->model->where('id', $id)->forceDelete();
    }

    /**
     * Find model with trash
     *
     * @param integer $id id
     *
     * @return Model
     */
    public function findWithTrashed(int $id)
    {
        return $this->model->withTrashed()->find($id);
    }

    /**
     * Find or fail model
     *
     * @param integer $id        id
     * @param array   $relations relations
     * @param array   $select    select
     *
     * @return Model|null
     */
    public function findOrFail(int $id, $relations = [], array $select = ['*'])
    {
        return $this->model
                ->with($relations)
                ->select($select)
                ->findOrFail($id);
    }

    /**
     * Find model with trash
     *
     * @param integer $id id
     *
     * @return Model|null
     */
    public function findOrFailWithTrashed(int $id, $relations = [], array $select = ['*'])
    {
        return $this->model
            ->with($relations)
            ->select($select)
            ->withTrashed()
            ->findOrFail($id);
    }

    /**
     * Update or create data
     * 
     * @param array $ids
     * @param array $params
     * 
     * @return mixed
     */
    public function updateOrCreate($ids, $params)
    {
        return $this->model->updateOrCreate($ids, $params);
    }

    /**
     * Update or create data
     * 
     * @param array $ids
     * @param array $params
     * 
     * @return mixed
     */
    public function updateOrCreateWithTrash($ids, $params)
    {   
        $instance = $this->model
            ->withTrashed()
            ->where($ids)
            ->first();

        if (empty($instance)) {
            $instance = new $this->model;
        }

        $instance->fill($params);

        return $instance->save();
    }

    /**
     * Find by
     *
     * @param array $whereData whereData
     * @param array $relations relations
     * @param array $select    select
     *
     * @return Model|null
     */
    public function findBy(array $whereData, $relations = [], array $select = ['*'])
    {
        return $this->model
                ->with($relations)
                ->select($select)
                ->where($whereData)
                ->first();
    }

    /**
     * FirstOrCreate data
     *
     * @param array $ids    ids
     * @param array $params params
     *
     * @return mixed
     */
    public function firstOrCreate($ids, $params)
    {
        return $this->model->firstOrCreate($ids, $params);
    }
}
