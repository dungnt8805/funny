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
        $data['film'] = $this->fri->findById($id);
        $data['episode'] = $this->eri->getNew();
        return View::make('admin/episodes/edit',compact('data'));
    }
    
    public function postNew($id){
        $form = $this->eri->getForm();
        if(!$form->isValid())
            return Redirect::back()->withInputs()->withErrors($form->getErrors());   
        $input = $form->getInputData();
        if(!empty($input['position']) || !is_numeric($input['position'])){
            $input['position'] = $this->eri->getMaxOrder($id) + 1;
        }
        $input['film_id'] = $id;
        $episode = $this->eri->create($input);
        return Redirect::route('admin.episodes.view',$episode->id);
        
    }

    public function getView($id)
    {
        $data['episode'] = $this->eri->findById($id);
        if(is_null($data['episode']))
            return Redirect::route('admin.films')->with('error',trans('admin.errors.not_found.episode'));
        $data['film'] = $this->fri->findById($data['episode']->film_id);
        return View::make('admin/episodes/edit', compact('data'));
    }
    
    public function postView($id){
        $form = $this->eri->getForm();
        if($form->isValid())
            return Redirect::back()->withInput()->withErrors($form->getErrors());   
        $input = $form->getInputData();
        if(!empty($input['position']) || !is_numeric($input['position'])){
            $input['position'] = $this->eri->getMaxOrder($id) + 1;
        }
        $episode = $this->eri->update($id,$input);
        return Redirect::route('admin.episodes.view',$episode->id);
    }
    
    public function postDelete($id){
        $episode = $this->eri->findById($id);
        $film_id = $episode->film_id;
        $episode->delete();
        return ['status'=>1,'error'=>0];
    }
}