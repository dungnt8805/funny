<?php

use Funny\Repositories\FilmRepositoryInterface as FRI;
use Funny\Repositories\CategoryRepositoryInterface as CRI;
use Funny\Repositories\DirectorRepositoryInterface as DRI;
use Funny\Repositories\ActorRepositoryInterface as ARI;
use Funny\Repositories\ManufacturerRepositoryInterface as MRI;
use Funny\Repositories\EpisodeRepositoryInterface as ERInterface;

class ConvertsController extends BaseController
{
    protected $log;

    protected $fri;

    protected $ari;
    protected $dri;
    protected $mri;
    protected $cri;
    protected $eri;

    public function __construct(MRI $mri, FRI $fri, CRI $cri, DRI $dri, ARI $ari, ERInterface $eri)
    {
        $this->log = new Convert();
        $this->cri = $cri;
        $this->ari = $ari;
        $this->mri = $mri;
        $this->dri = $dri;
        $this->fri = $fri;
        $this->eri = $eri;
    }

    public function getIndex()
    {
        $function = Input::get('type');
        return View::make('converts/index', compact('function'));
    }

    public function getFilms()
    {
        $skip = $this->log->getValue('films');
        $films = DB::connection('mysql_films')->table('film')
            ->join('film_info', 'film_info.phimid', '=', 'film.phimid')
            ->select('film.*', 'film_info.phimtxt', 'film_info.phiminfo', 'film_info.phimtag', 'film_info.timkiem')
            ->orderBy('film.phimid', 'ASC')->skip($skip)->limit(10)
            ->get();
        if (count($films) > 0) {
            foreach ($films as $film) {
                $f = [
                    'id' => $film->phimid, 'title' => $film->tenphim,
                    'eng_title' => $film->tentienganh,
                    'durations' => filter_var($film->thoiluong, FILTER_SANITIZE_NUMBER_INT),
                    'year' => $film->namsanxuat, 'hot' => $film->phimhot,
                    'views' => $film->viewed, 'nation_id' => $film->quocgia, 'trailer' => $film->trailer,
                    'quality' => $film->chatluong,
                    'short_description' => $film->phimtxt, 'thumbnail' => $film->phimimg,
                    'keywords' => $film->phimtag, 'multi' => $film->phimbo == 0 ? 0 : 1,
                    'imdb' => '', 'imdb_score' => 0, 'status' => 1
                ];
                $film_save = $this->fri->create($f);
                if ($film->dienvien != '') {
                    $actors_id = $this->ari->stringToArrayId($film->dienvien);
                    foreach ($actors_id as $aid) {
                        $film_save->actors()->attach($aid);
                    }
                }
                if ($film->nhasanxuat != '') {
                    $actors_id = $this->mri->stringToArrayId($film->nhasanxuat);
                    foreach ($actors_id as $aid) {
                        $film_save->manufacturers()->attach($aid);
                    }
                }
                if ($film->daodien != '') {
                    $actors_id = $this->dri->stringToArrayId($film->daodien);
                    foreach ($actors_id as $aid) {
                        $film_save->directors()->attach($aid);
                    }
                }
                if ($film->theloai != '') {
                    $actors_id = explode(',', $film->theloai);
                    foreach ($actors_id as $aid) {
                        if ($aid != '')
                            $film_save->_categories()->attach($aid);
                    }
                }
                $skip++;
            }
        } else
            return 'finish';
        $this->log->saveItem(array('code' => 'films', 'value' => $skip));
        echo $skip;

    }

    public function getEpisodes()
    {
        $skip = $this->log->getValue('episodes');
        $episodes = DB::connection('mysql_films')->table('ep')->skip($skip)->take(100)->get();
        if (count($episodes) > 0) {
            $eps = [];
            foreach ($episodes as $ep) {
                $eps[] = ['film_id' => $ep->phimid, 'subtitle' => $ep->epsub, 'url' => $ep->epurl, 'error' => $ep->error, 'position' => $ep->epname, 'trailer' => $ep->epdemo];
                $skip++;
            }
            $this->eri->inserts($eps);
        } else
            return 'finish';
        $this->log->saveItem(array('code' => 'episodes', 'value' => $skip));
        echo $skip;
    }
}

?>