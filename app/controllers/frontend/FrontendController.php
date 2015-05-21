<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/21/2015
 * @Time: 4:46 PM
 */

namespace Frontend;

use View;
use Funny\Repositories\CategoryRepositoryInterface as CRInterface;
use Funny\Repositories\NationRepositoryInterface as NRInterface;

class FrontendController extends \BaseController
{

    protected $cri;
    protected $nri;

    public function __construct(CRInterface $cri, NRInterface $nri)
    {
        parent::__construct();
        $this->cri = $cri;
        $this->nri = $nri;
        $this->prepare();
    }


    public function prepare()
    {
        $f_nations = $this->nri->listNationFromCache();
        $categories = $this->cri->listCategoriesFromCache();
        View::share(['nations'=>$f_nations,'categories'=>$categories]);
    }
}