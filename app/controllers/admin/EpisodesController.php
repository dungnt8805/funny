<?php
namespace Admin;

use Funny\Repositories\EpisodeRepositoryInterface as ERInterface;
use Funny\Repositories\FilmRepositoryInterface as FRInterface;
use Redirect;
use Lang;
use View;

class EpisodesController extends AdminController
{
    protected $eri;
    protected $fri;

    public function __construct(ERInterface $eri, FRInterface $fri)
    {
        $this->fri = $fri;
        $this->eri = $eri;
    }

    public function getList($film_id)
    {
        if (is_null($film = $this->fri->findById($film_id)))
            return Redirect::route('admin.films')->with('error', Lang::get('errors.not_found.film'));
        $episodes = $this->eri->listByFilmId($film_id);
        $data = ['film' => $film, 'episodes' => $episodes];
        return View::make('admin/episodes/list', compact('data'));
    }

    public function getNew($id)
    {

    }

    public function getView($id)
    {
        $data['episode'] = $this->eri->findById($id);
        return View::make('admin/episodes/edit', compact('data'));
    }
}