<?php
/**
 * Created by PhpStorm.
 * User: nguyentuan
 * Date: 5/12/2015
 * Time: 9:27 PM
 */

namespace Admin;


use Funny\Film;
use Funny\Nation;
use Funny\Repositories\FilmRepositoryInterface;
use Funny\Repositories\NationRepositoryInterface;
use Funny\Repositories\CategoryRepositoryInterface;
use Funny\Repositories\ActorRepositoryInterface;
use Funny\Repositories\DirectorRepositoryInterface;
use Funny\Repositories\ManufacturerRepositoryInterface;

use View;
use Redirect;
use Input;
use Response;

class FilmsController extends AdminController
{
    protected $objFilm;
    protected $cri;
    protected $nri;
    protected $ari;
    protected $dri;
    protected $mri;

    public function __construct(FilmRepositoryInterface $film, NationRepositoryInterface $nation, CategoryRepositoryInterface $category, ActorRepositoryInterface $actor, DirectorRepositoryInterface $director, ManufacturerRepositoryInterface $manu)
    {
        parent::__construct();
        $this->objFilm = $film;
        $this->cri = $category;
        $this->nri = $nation;
        $this->ari = $actor;
        $this->dri = $director;
        $this->mri = $manu;
    }

    public function getIndex()
    {
        $type = Input::get('type');
        $nations = $this->nri->listAll(['has_film' => true]);
        $categories = $this->cri->listAll();
        
        $filter = [];
        if($type == 'hot'){
            $filter['is_hot'] = 1;
        }
        if($type == 'series'){
            $filter['is_series'] = 1;
        }
        
        $films = $this->objFilm->findAll($filter);

        $data = ['nations' => $nations, 'categories' => $categories, 'films' => $films];
        return View::make('admin.films.index', compact('data'));


    }

    public function getNew()
    {
        $nations = $this->nri->listAll(['has_film' => true]);
        $categories = $this->cri->listAll();
        $film = new Film();
        $selectedCategories = [];
        $data = [
                'nations' => $nations, 'categories' => $categories,
                'directors'=>'','actors'=>'','studios'=>'',
                'film' => $film,'selectedCategories'=>$selectedCategories
                ];
        return View::make('admin.films.edit', compact('data'));
    }

    public function postNew()
    {
        $form = $this->objFilm->getForm();
        if (!$form->isValid())
            return Redirect::back()->withInput()->withErrors($form->getErrors());
        $film = $this->objFilm->create($form->getInputData());
        $inputs = $form->getInputData();
        if(!empty($inputs['categories']))
            foreach($inputs['categories'] as $key => $value)
                $film->categories()->attach($value);
        // check director of film
        if(!empty($inputs['directors'])){
            $directors_id = $this->dri->stringToArrayId($inputs['directors']);
            $film->directors()->detach();
            foreach($directors_id as $id){
                $film->directors()->attach($id);
            }
        }
        
        if(!empty($inputs['studios'])){
            $manufacturers_id = $this->mri->stringToArrayId($inputs['studios']);
            $film->manufacturers()->detach();
            foreach($manufacturers_id as $id){
                $film->manufacturers()->attach($id);
            }
        }
        
        if(!empty($inputs['actors'])){
            $actors_id = $this->ari->stringToArrayId($inputs['actors']);
            $film->actors()->detach();
            foreach($actors_id as $id){
                $film->actors()->attach($id);
            }
        }
        return Redirect::route('admin.films.view', $film->id);
    }

    public function getView($id)
    {
        $nations = $this->nri->listAll(['has_film' => true]);
        $categories = $this->cri->listAll();
        $film = $this->objFilm->findById($id);
        $selectedCategories = $film->listIdCategories();
        $directors = implode(',',$film->directors()->lists('name'));
        $actors = implode(',',$film->actors()->lists('name'));
        $manufacturers = implode(',',$film->manufacturers()->lists('name'));
        $data = [
                'nations' => $nations, 'categories' => $categories,
                'directors'=>$directors, 'film' => $film,
                'actors'=>$actors,'studios'=>$manufacturers,
                'selectedCategories'=>$selectedCategories
                ];
        return View::make('admin.films.edit', compact('data'));
    }

    public function postView($id)
    {
        $form = $this->objFilm->getForm();
        if (!$form->isValid())
            return Redirect::back()->withInput()->withErrors($form->getErrors());
        $film = $this->objFilm->update($id, $form->getInputData());
        $inputs = $form->getInputData();
        if(!empty($inputs['categories'])){
            $film->_categories()->detach();
            foreach($inputs['categories'] as $key => $value)
                $film->_categories()->attach($value);
        }
        
        if(!empty($inputs['directors'])){
            $directors_id = $this->dri->stringToArrayId($inputs['directors']);
            $film->directors()->detach();
            foreach($directors_id as $id){
                $film->directors()->attach($id);
            }
        }else{
            $film->directors()->detach();
        }
        
        if(!empty($inputs['studios'])){
            $manufacturers_id = $this->mri->stringToArrayId($inputs['studios']);
            $film->manufacturers()->detach();
            foreach($manufacturers_id as $id){
                $film->manufacturers()->attach($id);
            }
        }else{
            $film->manufacturers()->detach();
        }
        
        if(!empty($inputs['actors'])){
            $actors_id = $this->ari->stringToArrayId($inputs['actors']);
            $film->actors()->detach();
            foreach($actors_id as $id){
                $film->actors()->attach($id);
            }
        }else{
            $film->actors()->detach();
        }
        return Redirect::route('admin.films.view', $film->id);
    }
    
    
    public function getActors(){
        $actors = $this->ari->listAll();
        return Response::json($actors);
    }
    
    public function postDirectors(){
        $term = e(Input::get('term'));
        $directors = $this->dri->filterByTerm(e($term));
        return Response::json($directors);
    }
    public function getDirectors(){
        $term = e(Input::get('term'));
        $directors = $this->dri->filterByTerm(e($term));
        return Response::json($directors);
    }

}