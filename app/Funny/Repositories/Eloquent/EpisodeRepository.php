<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/12/2015
 * @Time: 2:52 PM
 */

namespace Funny\Repositories\Eloquent;

use Funny\Episode;
use Funny\Repositories\EpisodeRepositoryInterface;
use Funny\Services\Forms\EpisodeForm;
class EpisodeRepository extends AbstractRepository implements EpisodeRepositoryInterface
{
    /**
     * Create a new DbCategoryRepository instance.
     *
     * @param  \Funny\Episode $episode
     */
    public function __construct(Episode $episode)
    {
        $this->model = $episode;
    }

    /**
     * Find a Episode by id.
     *
     * @param  mixed $id
     * @return \Funny\Episode
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create new Episode
     *
     * @param array $data
     * @return \Funny\Episode
     */

    public function create(array $data)
    {
        
        $episode = $this->getNew();

        $episode->film_id = $data['film_id'];
        $episode->position = $data['position'];
        $episode->url = $data['url'];
        $episode->subtitle = empty($data['subtitle'])?:$data['subtitle'];
        $episode->save();
        return $episode;
    }


    /**
     * Update episode from database
     *
     * @param int $id
     * @param array $data
     * @return \Funny\Episode
     */
    public function update($id, array $data)
    {
        $episode = $this->findById($id);
        $episode->position = $data['position'];
        $episode->url = $data['url'];
        $episode->subtitle = empty($data['subtitle'])?:$data['subtitle'];
        $episode->save();
        return $episode;

    }

    /**
     * return list episodes of a film
     *
     * @param int $film_id
     * @return \Illuminate\Database\Eloquent\Collection|\Funny\Episode
     */
    public function listByFilmId($film_id)
    {
        return $this->model->where('film_id', '=', $film_id)->orderBy('position', 'ASC')->paginate(20);
    }
    /**
     * return max episode of a film
     * 
     * @param int $film_id
     * @return int $position
     */
    public function getMaxOrder($film_id){
        return $this->model->where('film_id','=',$film_id)->max('position');
    }

    public function inserts(array $data)
    {
        $this->model->insert($data);
    }
    public function getForm(){
        return new EpisodeForm;
    }
}