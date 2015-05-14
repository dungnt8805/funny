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
    
    public function create(array $data){
        $episode = $this->getNew();
        
        $episode->film_id = $data['film_id'];
        
    }


    /**
     * Update episode from database
     * 
     * @param int $id
     * @param array $data
     * @return \Funny\Episode
     */
    public function update($id,array $data){
        $episode = $this->findById($id);
        
    }
}