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
use Funny\Services\Forms\FilmForm;

class FilmRepository extends AbstractRepository implements FilmRepositoryInterface
{

    const is_series = 1;
    const no_series = 0;

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
        $film = $this->getNew();
        if($data['id'])
            $film->id = $data['id'];
        $film->title = e($data['title']);
        
        $film->eng_title = e($data['eng_title']);
        $film->slug = \Str::slug($film->eng_title);
        $film->durations = $data['durations'];
        $film->year = e($data['year']);
        $film->multi = !empty($data['multi']) ? $data['multi'] : 0;
        $film->hot = !empty($data['hot']) ? $data['hot'] : 0;
        $film->nation_id = $data['nation_id'];
        $film->trailer = $data['trailer'];
        $film->thumbnail = $data['thumbnail'];
        $film->imdb = $data['imdb'];
        $film->imdb_score = $data['imdb_score'];
        $film->short_description = $data['short_description'];
        $film->status = $data['status'];
        $film->quality = $data['quality'];
        $film->keywords = $data['keywords'];

        $film->save();
        return $film;
    }

    /**
     * Find film by conditions
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Pagination\Paginator|\Funny\Film
     */
    public function findAll(array $data)
    {
        $query = $this->model;
        if (array_key_exists('is_series', $data))
            $query = $query->where('films.multi', '=', 1);
        if (array_key_exists('is_hot', $data))
            $query = $query->where('films.hot', '=', 1);
        if (array_key_exists('year', $data)) {
            $query = $query->where('films.year', '=', $data['year']);
        }
        if (array_key_exists('nation', $data))
            $query = $query->where('films.nation_id', '=', $data['nation']);

        $query = $query->join('nations', 'nations.id', '=', 'films.nation_id');

        $query = $query->select('films.*');
        $films = $query->paginate(20);
        return $films;
    }

    public function getForm()
    {
        return new FilmForm;
    }

    /**
     * Update a specified film from database
     *
     * @param int $id
     * @param array $data
     * @return \Funny\Film
     */
    public function update($id, $data)
    {
        $film = $this->findById($id);

        $film->title = e($data['title']);
        $film->slug = \Str::slug($film->title);
        $film->eng_title = e($data['eng_title']);
        $film->durations = e($data['durations']);
        $film->year = e($data['year']);
        $film->multi = !empty($data['multi']) ? $data['multi'] : 0;
        $film->hot = !empty($data['hot']) ? $data['hot'] : 0;
        $film->nation_id = $data['nation_id'];
        $film->trailer = $data['trailer'];
        $film->thumbnail = $data['thumbnail'];
        $film->imdb = $data['imdb'];
        $film->imdb_score = $data['imdb_score'];
        $film->short_description = $data['short_description'];
//        $film->status = $data['status'];
        $film->quality = $data['quality'];
        $film->keywords = $data['keywords'];

        $film->save();
        return $film;
    }
    
    /**
     * Get categories of one object from database 
     * 
     * 
     * 
     */
     public function categories(){
         return $this->_categories()->get();
     }
}