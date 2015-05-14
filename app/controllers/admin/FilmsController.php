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

use View;
use Redirect;
use Input;

class FilmsController extends AdminController
{
    protected $objFilm;
    protected $cri;
    protected $nri;

    public function __construct(FilmRepositoryInterface $film, NationRepositoryInterface $nation, CategoryRepositoryInterface $category)
    {
        parent::__construct();
        $this->objFilm = $film;
        $this->cri = $category;
        $this->nri = $nation;
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
        $data = ['nations' => $nations, 'categories' => $categories, 'film' => $film];
        return View::make('admin.films.edit', compact('data'));
    }

    public function postNew()
    {
        $form = $this->objFilm->getForm();
        if (!$form->isValid())
            return Redirect::back()->withInput()->withErrors($form->getErrors());
        $film = $this->objFilm->create($form->getInputData());
        return Redirect::route('admin.films.view', $film->id);
    }

    public function getView($id)
    {
        $nations = $this->nri->listAll(['has_film' => true]);
        $categories = $this->cri->listAll();
        $film = $this->objFilm->findById($id);
        $data = ['nations' => $nations, 'categories' => $categories, 'film' => $film];
        return View::make('admin.films.edit', compact('data'));
    }

    public function postView($id)
    {
        $form = $this->objFilm->getForm();
        if (!$form->isValid())
            return Redirect::back()->withInput()->withErrors($form->getErrors());
        $film = $this->objFilm->update($id, $form->getInputData());
        return Redirect::route('admin.films.view', $film->id);
    }
}