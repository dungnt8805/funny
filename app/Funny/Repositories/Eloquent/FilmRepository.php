<?php
/**
 * Created by PhpStorm.
 * User: nguyentuan
 * Date: 5/12/2015
 * Time: 9:23 PM
 */

namespace Funny\Repositories\Eloquent;


use Funny\Film;
use Funny\Repositories\FilmRepositoryInterface;

class FilmRepository extends AbstractRepository implements FilmRepositoryInterface
{

    public function __construct(Film $film)
    {
        $this->model = $film;
    }

    /**
     * Find a Film by id
     *
     * @param int $id
     * @return \Funny\Film
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Get an array of key-value (id=>title) pairs of films
     *
     * @return array
     */
    public function listAll()
    {
        return $this->model->lists('title', 'id');
    }

    /**
     * Create a new Film in database
     *
     * @param array $data
     * @return \Funny\Film
     */
    public function create(array $data)
    {
        // TODO: Implement create() method.
    }
}