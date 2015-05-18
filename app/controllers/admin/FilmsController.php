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
        $nations = $this->nri->listAll(['has_film' => true]);
        $categories = $this->cri->listAll();

        $films = $this->objFilm->findAll([]);

        $data = ['nations' => $nations, 'categories' => $categories, 'films' => $films];
        return View::make('admin.films.index', compact('data'));


    }

    public function getNew()
    {
        $nations = $this->nri->listAll(['has_film' => true]);
        $categories = $this->cri->listAll();
        $film = new Film();
        $selectedCategories = [];
        $data = ['nations' => $nations, 'categories' => $categories, 'film' => $film,'selectedCategories'=>$selectedCategories];
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
        return Redirect::route('admin.films.view', $film->id);
    }

    public function getView($id)
    {
        $nations = $this->nri->listAll(['has_film' => true]);
        $categories = $this->cri->listAll();
        $film = $this->objFilm->findById($id);
        $selectedCategories = $film->listIdCategories();
        $directors = $film->directors()->get();
        $actors = $film->actors()->get();
        $manufacturers = $film->manufacturers()->get();
        $data = ['nations' => $nations, 'categories' => $categories, 'film' => $film,'selectedCategories'=>$selectedCategories];
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