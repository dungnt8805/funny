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
use Str;

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
        return $this->model->lists('name', 'id');
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
        $director->lowercase = Str::lower($director->name);
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

    public function filterByTerm($term)
    {
        return $this->model->where('name', 'LIKE', "%" . $term . "%")->limit(10)->select('id', 'name')->get();
    }

    public function findIdByName($name)
    {
        return $this->model->where('lowercase', '=', $name)->select('id')->first();
    }

    public function stringToArrayId($str)
    {
        if ($str != '') {
            $names = explode(',', $str);
            $ids = Array();
            foreach ($names as $name) {
                if (!is_null($director = $this->findBySlug(Str::slug($name)))) {
                    $ids[] = $director->id;
                } else {
                    $director = $this->create(['name' => $name]);
                    $ids[] = $director->id;
                }
            }
            return $ids;
        }
    }
    
    public function findIdByName($name){
        return $this->model->where('lowercase','=',$name)->select('id')->first();
    }
    
    public function stringToArrayId($str){
        if($str != ''){
            $names = explode(',',$str);
            $ids = Array();
            foreach($names as $name){
                if(!is_null($director = $this->findIdByName($name))){
                    $ids[] = $director->id;
                }else{
                    $director = $this->create(['name'=>$name]);
                    $ids[] = $director->id;
                }
            }
            return $ids;
        }
    }

    public function getForm()
    {
        return new  DirectorForm;
    }

    /**
     * Find a director from database by slug
     *
     * @param string $slug
     *
     * @return \Funny\Director
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', '=', $slug)->select('id')->first();
    }
}