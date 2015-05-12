<?php
/**
 * Created by PhpStorm.
 * User: nguyentuan
 * Date: 5/12/2015
 * Time: 10:09 PM
 */

namespace Funny\Repositories;


interface ManufacturerRepositoryInterface {
    /**
     * Find a actor by id
     *
     * @param int $id
     * @return \Funny\Manufacturer
     */
    public function findById($id);

    /**
     * Get an array of key-value (id=>name) pairs of actors
     *
     * @return array
     */

    public function listAll();

    /**
     * Create an actor in database
     *
     * @param array $data
     * @return \Funny\Manufacturer
     */

    public function create(array $data);

    /**
     * Update an specified actor from database
     *
     * @param int $id
     * @param array $data
     * @return \Funny\Manufacturer
     */
    public function update($id, array $data);
}