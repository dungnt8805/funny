<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/13/2015
 * @Time: 11:13 AM
 */

namespace Funny\Repositories\Eloquent;


use Funny\Director;
use Funny\Repositories\DirectorRepositoryInterface;
use Funny\Services\Forms\DirectorForm;

class DirectorRepository extends AbstractRepository implements DirectorRepositoryInterface
{


    public function __construct(Director $director)
    {
        $this->model = $director;
    }

    /**
     * Find a actor by id
     *
     * @param int $id
     * @return \Funny\Director
     */
    public function findById($id)
    {

    }

    /**
     * Get an array of key-value (id=>name) pairs of actors
     *
     * @return array
     */
    public function listAll()
    {
        // TODO: Implement listAll() method.
    }

    /**
     * Create an actor in database
     *
     * @param array $data
     * @param bool $full
     * @return \Funny\Director
     */
    public function create(array $data, $full = false)
    {
        $director = $this->getNew();

        $director->name = e($data['name']);
        $director->slug = \Str::slug($director->name);
        $director->nation_id = !empty($data['nation_id']) ? $data['nation_id'] : 0;
        $director->avatar = !empty($data['avatar']) ? $data['avatar'] : "";
        $director->birth_date = !empty($data['birth_date']) ? $data['birth_date'] : 0;
        $director->birth_month = !empty($data['birth_month']) ? $data['birth_month'] : 0;
        $director->birth_year = !empty($data['birth_year']) ? $data['birth_year'] : 0;
        $director->gender = !empty($data['gender']) ? $data['gender'] : 0;
        $director->bio = !empty($data['bio']) ? $data['bio'] : 0;
        $director->save();
        return $director;
    }

    /**
     * Update an specified actor from database
     *
     * @param int $id
     * @param array $data
     * @return \Funny\Director
     */
    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function getForm()
    {
        return new  DirectorForm;
    }
}