<?php
/**
 * Created by PhpStorm.
 * User: nguyentuan
 * Date: 5/12/2015
 * Time: 10:08 PM
 */

namespace Funny\Repositories;


interface DirectorRepositoryInterface
{
    /**
     * Find a actor by id
     *
     * @param int $id
     * @return \Funny\Director
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
     * @param bool $full
     * @return \Funny\Director
     */

    public function create(array $data, $full = false);

    /**
     * Update an specified actor from database
     *
     * @param int $id
     * @param array $data
     * @return \Funny\Director
     */
    public function update($id, array $data);
}