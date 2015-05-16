<?php
namespace Funny\Repositories\Eloquent;

use Funny\Repositories\ManufacturerRepositoryInterface;
use Funny\Manufacturer;

class ManufacturerRepository extends AbstractRepository implements ManufacturerRepositoryInterface{
    
    public function __construct(Manufacturer $manu){
        $this->model = $manu;
    }
    /**
     * Find a actor by id
     *
     * @param int $id
     * @return \Funny\Manufacturer
     */
    public function findById($id){}

    /**
     * Get an array of key-value (id=>name) pairs of actors
     *
     * @return array
     */

    public function listAll(){}

    /**
     * Create an actor in database
     *
     * @param array $data
     * @param bool $full
     * @return \Funny\Manufacturer
     */

    public function create(array $data, $full = false){}

    /**
     * Update an specified actor from database
     *
     * @param int $id
     * @param array $data
     * @return \Funny\Manufacturer
     */
    public function update($id, array $data){}
}
