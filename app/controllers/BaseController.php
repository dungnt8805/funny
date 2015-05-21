<?php

use Funny\Repositories\CategoryRepositoryInterface as CRInterface;
use Funny\Repositories\NationRepositoryInterface as NRInterface;

class BaseController extends Controller
{


    /**
     * The layout used by the controller.
     *
     * @var \Illuminate\View\View
     */
    protected $layout = 'layouts.default';

    public function __construct()
    {
        $this->beforeFilter('crsf', ['on' => 'post']);
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {


        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }



}
