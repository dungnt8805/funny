<?php
/**
 * Created by PhpStorm.
 * User: nguyentuan
 * Date: 5/12/2015
 * Time: 9:27 PM
 */

namespace Admin;


use Funny\Repositories\FilmRepositoryInterface;

class FilmsController extends AdminController
{
    protected $objFilm;

    public function __construct(FilmRepositoryInterface $film)
    {
        parent::__construct();
        $this->objFilm = $film;
    }

    public function getIndex()
    {

    }
}