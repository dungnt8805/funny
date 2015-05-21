<?php
namespace Funny\Repositories\Eloquent;

use Funny\Repositories\ManufacturerRepositoryInterface;
use Funny\Manufacturer;
use Str;

class ManufacturerRepository extends AbstractRepository implements ManufacturerRepositoryInterface
{

    public function __construct(Manufacturer $manu)
    {
        $this->model = $manu;
    }

    /**
     * Find a actor by id
     *
     * @param int $id
     * @return \Funny\Manufacturer
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
    }

    /**
     * Create an actor in database
     *
     * @param array $data
     * @param bool $full
     * @return \Funny\Manufacturer
     */

    public function create(array $data, $full = false)
    {
        $model = $this->getNew();
        $model->name = e($data['name']);
        $model->slug = Str::slug($model->name);
        $model->lowercase = Str::lower($model->name);

        $model->save();
        return $model;
    }

    /**
     * Update an specified actor from database
     *
     * @param int $id
     * @param array $data
     * @return \Funny\Manufacturer
     */
    public function update($id, array $data)
    {
    }

    /**
     * Find a manufacturer from database by name
     *
     * @param string $name
     *
     * @return \Funny\Manufacturer
     */
    public function findIdByName($name)
    {
        return $this->model->where('lowercase', '=', $name)->select('id')->first();
    }

    /**
     * Find manufacturers from database by name
     *
     * @param array names
     *
     * @return array
     */
    public function stringToArrayId($str)
    {
        if ($str != '') {
            $names = explode(',', $str);
            $ids = Array();
            foreach ($names as $name) {
                if (!is_null($manu = $this->findBySlug(Str::slug($name)))) {
                    $ids[] = $manu->id;
                } else {
                    $manu = $this->create(['name' => $name]);
                    $ids[] = $manu->id;
                }
            }
            return $ids;
        }
    }

    /**
     * Find a manufacturer from database by slug
     *
     * @param string $slug
     *
     * @return \Funny\Manufacturer
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', '=', $slug)->select('id')->first();
    }
}
