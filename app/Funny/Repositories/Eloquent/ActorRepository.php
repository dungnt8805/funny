<?php
/**
 * Created by PhpStorm.
 * User: nguyentuan
 * Date: 5/12/2015
 * Time: 10:17 PM
 */

namespace Funny\Repositories\Eloquent;


use Funny\Actor;
use Funny\Repositories\ActorRepositoryInterface;
use Str;

class ActorRepository extends AbstractRepository implements ActorRepositoryInterface
{

    public function __construct(Actor $actor)
    {
        $this->model = $actor;
    }

    /**
     * Find a actor by id
     *
     * @param int $id
     * @return \Funny\Actor
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Get an array of key-value (id=>name) pairs of actors
     *
     * @return array
     */
    public function listAll()
    {
        return $this->model->lists('name', 'id');
    }

    /**
     * Create an actor in database
     *
     * @param array $data
     * @param bool $full
     * @return \Funny\Actor
     */
    public function create(array $data, $full = true)
    {
        $actor = $this->getNew();

        $actor->name = e($data['name']);
        $actor->slug = Str::slug($actor->title);
        $actor->nation_id = !empty($data['nation_id']) ? $data['nation_id'] : 0;
        $actor->avatar = !empty($data['avatar']) ? $data['avatar'] : "";
        $actor->birth_date = !empty($data['birth_date']) ? $data['birth_date'] : 0;
        $actor->birth_month = !empty($data['birth_month']) ? $data['birth_month'] : 0;
        $actor->birth_year = !empty($data['birth_year']) ? $data['birth_year'] : 0;
        $actor->gender = !empty($data['gender']) ? $data['gender'] : 0;
        $actor->bio = !empty($data['bio']) ? $data['bio'] : 0;
        $actor->save();
        return $actor;
    }

    /**
     * Update an specified actor from database
     *
     * @param int $id
     * @param array $data
     * @return \Funny\Actor
     */
    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }
}