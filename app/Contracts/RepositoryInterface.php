<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
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
    public function getAll(array $creatials = [], $relations = [], string $orderSort = 'id', string $orderBy = 'ASC', array $select = ['*']);

    /**
     * Find model
     *
     * @param integer $id        id
     * @param array   $relations relations
     * @param array   $select    select
     *
     * @return Model
     */
    public function find(int $id, $relations = [], array $select = ['*']);

    /**
     * Create function
     *
     * @param array $data data
     *
     * @return Model
     */
    public function create(array $data);

    /**
     * Update function
     *
     * @param integer|Model $input input
     * @param array         $data  data
     *
     * @return Model
     */
    public function update($input, array $data);

    /**
     * Restore function
     *
     * @param integer $id id
     *
     * @return void
     */
    public function restore(int $id);

    /**
     * Delete function
     *
     * @param integer $id id
     *
     * @return void
     */
    public function delete(int $id);

    /**
     * Force delete
     *
     * @param integer $id id
     *
     * @return void
     */
    public function forceDelete(int $id);

    /**
     * Find model with trash
     *
     * @param integer $id id
     *
     * @return Model
     */
    public function findWithTrashed(int $id);

    /**
     * Find or fail model
     *
     * @param integer $id        id
     * @param array   $relations relations
     * @param array   $select    select
     *
     * @return Model
     */
    public function findOrFail(int $id, $relations = [], array $select = ['*']);

    /**
     * Find model with trash
     *
     * @param integer $id id
     *
     * @return Model|null
     */
    public function findOrFailWithTrashed(int $id, $relations = [], array $select = ['*']);

    /**
     * Find by
     *
     * @param array $whereData whereData
     * @param array $relations relations
     * @param array $select    select
     *
     * @return Model|null
     */
    public function findBy(array $whereData, $relations = [], array $select = ['*']);

    /**
     * Update or create data
     * 
     * @param array $ids
     * @param array $params
     * 
     * @return mixed
     */
    public function updateOrCreate($ids, $params);

    /**
     * FirstOrCreate data
     *
     * @param array $ids    ids
     * @param array $params params
     *
     * @return mixed
     */
    public function firstOrCreate($ids, $params);
}
