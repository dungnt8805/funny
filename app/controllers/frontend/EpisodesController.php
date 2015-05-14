<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/12/2015
 * @Time: 2:59 PM
 */

namespace Frontend;

use BaseController;
use Funny\Repositories\EpisodeRepositoryInterface;


class EpisodesController extends BaseController
{

    protected $objEpisode;

    public function __construct(EpisodeRepositoryInterface $episode)
    {
        parent::__construct();
        $this->objEpisode = $episode;
    }

    public function getView($id, $slug)
    {
        $episode = $this->objEpisode->findById($id);
    }
}