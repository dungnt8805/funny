<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/11/2015
 * @Time: 2:23 PM
 */

namespace Funny\Repositories;


/**
 * Interface CategoryRepositoryInterface
 * @package Funny\Repositories
 */
interface CategoryRepositoryInterface
{
    /**
     * Find a playlist by id.
     *
     * @param  mixed $id
     * @return \Funny\Category
     */
    public function findById($id);

    /**
     * Update the specified playlist in the database.
     *
     * @param  mixed $id
     * @param  array $data
     * @return \Funny\Category
     */
    public function update($id, array $data);

    /**
     * Create a new playlist in the database.
     *
     * @param  array $data
     * @return \Funny\Category
     */
    public function create(array $data);

    /**
     * find all categories
     * @param
     *
     * return \Illuminate\Database\Eloquent\Collection|\Funny\Category[]
     */
    public function findAll();

    /**
     * Delete the specified category from the database.
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id);


    /**
     * Restore the specified category from the database
     * @param int $id
     * @return void
     */
    public function _restore($id);
    /**
     * Get an array of key-value (id => name) pairs of all categoires
     * @return array
     */
    public function listAll();
    /**
     * find list nations from database then save to cache
     *
     * @return \Illuminate\Database\Eloquent\Collection|Cache|\Funny\Category
     */
    public function listCategoriesFromCache();

}