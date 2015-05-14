<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/12/2015
 * @Time: 4:23 PM
 */

namespace Funny\Repositories;


interface NationRepositoryInterface
{
    /**
     * Get an array of key-value (id=>name) pairs of all nations
     * @param array $data
     * @return array
     */
    public function listAll($data = array());

    /**
     * Create a new Nation in database
     *
     * @param array $data
     * @return \Funny\Nation
     */
    public function create(array $data);

    /**
     * Update a Nation in database
     *
     * @param int $id
     * @param array $data
     * @return \Funny\Nation
     */
    public function update($id, array $data);

    /**
     * Find a Nation by id.
     *
     * @param  mixed $id
     * @return \Funny\Nation
     */
    public function findById($id);

    /**
     * find all nations
     * @param
     *
     * return \Illuminate\Database\Eloquent\Collection|\Funny\Category[]
     */
    public function findAll(array $conditions);
}