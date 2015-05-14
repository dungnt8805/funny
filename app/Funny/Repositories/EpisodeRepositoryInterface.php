<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/12/2015
 * @Time: 2:52 PM
 */

namespace Funny\Repositories;


interface EpisodeRepositoryInterface
{
    /**
     * Find a Episode by id.
     *
     * @param  mixed $id
     * @return \Funny\Episode
     */

    public function findById($id);
    
    /**
     * Create new Episode
     * 
     * @param array $data
     * @return \Funny\Episode
     */
    
    public function create(array $data);


    /**
     * Update episode from database
     * 
     * @param int $id
     * @param array $data
     * @return \Funny\Episode
     */
    public function update($id,array $data);
}