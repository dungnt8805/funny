<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/12/2015
 * @Time: 4:23 PM
 */

namespace Funny\Repositories\Eloquent;


use Funny\Nation;
use Funny\Repositories\NationRepositoryInterface;
use Funny\Services\Forms\NationForm;

class NationRepository extends AbstractRepository implements NationRepositoryInterface
{

    public function __construct(Nation $nation)
    {
        $this->model = $nation;
    }

    /**
     * Get an array of key-value (id=>name) pairs of all nations
     *
     * @param array $data
     * @return array
     */
    public function listAll($data = array())
    {
        $query = $this->model;
        if (key_exists('has_film', $data))
            $query = $query->where('has_film', '=', 1);

        return $query->lists('name', 'id');
    }

    /**
     * Create a new Nation in database
     *
     * @param array $data
     * @return \Funny\Nation
     */
    public function create(array $data)
    {
        $nation = $this->getNew();

        $nation->name = e($data['name']);
        $nation->position = $data['position'];
        $nation->vi_name = e($data['vi_name']);
        $nation->hidden = $data['hidden'];
        $nation->has_film = $data['has_film'];
        $nation->save();

        return $nation;
    }

    /**
     * Update a Nation in database
     *
     * @param int $id
     * @param array $data
     * @return \Funny\Nation
     */
    public function update($id, array $data)
    {
        $nation = $this->findById($id);

        $nation->name = e($data['name']);
        $nation->vi_name = e($data['vi_name']);
        $nation->hidden = $data['hidden'];
        $nation->has_film = $data['has_film'];
        $nation->position = $data['position'];
        $nation->save();

        return $nation;
    }

    /**
     * Find a Nation by id.
     *
     * @param  mixed $id
     * @return \Funny\Nation
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * find all nations
     *
     * @param array $conditions
     *
     * return \Illuminate\Database\Eloquent\Collection|\Funny\Nation[]
     */
    public function findAll(array $conditions)
    {
        $query = $this->model;
        if (key_exists('has_film', $conditions))
            $query = $query->where('has_film', '=', $conditions['has_film']);
        if (key_exists('hidden', $conditions))
            $query = $query->where('hidden', '=', $conditions['hidden']);
        if (key_exists('order', $conditions))
            $query = $query->orderBy($conditions['order']['field'], $conditions['order']['asc']);
        $nations = $query->get();
        return $nations;
    }


    public function getForm()
    {
        return new NationForm;
    }
}