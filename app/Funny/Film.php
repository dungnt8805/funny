<?php
namespace Funny;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Film extends Model
{
    protected $table = 'films';
    use SoftDeletingTrait;
    protected $dates = ['created_at'];


    public function _categories()
    {
        return $this->belongsToMany('Funny\Category', 'films_categories', 'film_id', 'category_id');
    }

    public function listIdCategories()
    {
        $categories = $this->_categories()->get();
        $array = [];
        foreach ($categories as $category)
            $array[] = $category->id;
        return $array;
    }

    public function directors()
    {
        return $this->belongsToMany('Funny\Director', 'films_directors', 'film_id', 'directory_id');
    }

    public function actors()
    {
        return $this->belongsToMany('Funny\Actor', 'films_actors', 'film_id', 'actor_id');
    }

    public function manufacturers()
    {
        return $this->belongsToMany('Funny\Manufacturer', 'films_manufacturers', 'film_id', 'manufacturer_id');
    }

    public function episodes()
    {
        return $this->hasMany('Episode', 'film_id', 'id');
    }
}