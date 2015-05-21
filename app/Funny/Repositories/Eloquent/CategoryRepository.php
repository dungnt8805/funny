<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/11/2015
 * @Time: 2:23 PM
 */

namespace Funny\Repositories\Eloquent;


use Funny\Category;
use Cache;
use Funny\Repositories\CategoryRepositoryInterface;
use Funny\Services\Forms\CategoryForm;
use Str;

/**
 * Class CategoryRepository
 * @package Funny\Repositories\Eloquent
 */
class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
    /**
     * Create a new DbCategoryRepository instance.
     *
     * @param  \Funny\Category $category
     */
    function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * Find a playlist by id.
     *
     * @param  mixed $id
     * @return \Funny\Category
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Update the specified playlist in the database.
     *
     * @param  mixed $id
     * @param  array $data
     * @return \Funny\Category
     */
    public function update($id, array $data)
    {
        $category = $this->findById($id);

        $category->title = e($data['title']);
        $category->slug = Str::slug($category->title);
        $category->description = $data['description'];
        $category->parent_id = !empty($data['parent_id']) ? $data['parent_id'] : 0;
        $category->status = !empty($data['status']) ? $data['status'] : 1;
        $category->thumbnail = !empty($data['thumbnail']) ? $data['thumbnail'] : "";
        $category->lead = !empty($data['lead']) ? e($data['lead']) : "";
        $category->save();
        return $category;
    }

    /**
     * Create a new playlist in the database.
     *
     * @param  array $data
     * @return \Funny\Category
     */
    public function create(array $data)
    {
        $category = $this->getNew();

        $category->title = e($data['title']);
        $category->slug = Str::slug($category->title);
        $category->description = $data['description'];
        $category->parent_id = !empty($data['parent_id']) ? $data['parent_id'] : 0;
        $category->status = !empty($data['status']) ? $data['status'] : 1;
        $category->thumbnail = !empty($data['thumbnail']) ? $data['thumbnail'] : "";
        $category->lead = !empty($data['lead']) ? e($data['lead']) : "";
        $category->save();
        return $category;
    }

    /**
     * find all categories
     * @param
     *
     * return \Illuminate\Database\Eloquent\Collection|\Funny\Category[]
     */
    public function findAll()
    {
        return $this->model->get();

    }

    /**
     * Delete the specified category from the database.
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $category = $this->findById($id);
        $category->delete();
    }

    /**
     * Get an array of key-value (id => name) pairs of all categoires
     * @return array
     */
    public function listAll()
    {
        return $this->model->lists('title', 'id');
    }

    public function getForm()
    {
        return new CategoryForm;
    }

    /**
     * Restore the specified category from the database
     * @param int $id
     * @return void
     */
    public function _restore($id)
    {
        $category = $this->model->withTrashed()->find($id);
        $category->restore();
    }

    /**
     * find list nations from database then save to cache
     *
     * @return \Illuminate\Database\Eloquent\Collection|Cache|\Funny\Category
     */
    public function listCategoriesFromCache()
    {
        $model = $this->model;
        $key = $model::cache_key;

        if (Cache::has($key))
            return Cache::get($key);
        $categories = $model->get();
        Cache::put($key, $categories, 60);
        return $categories;
    }
}