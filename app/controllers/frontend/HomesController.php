<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/21/2015
 * @Time: 3:42 PM
 */

namespace Frontend;

use BaseController;
use View;

class HomesController extends FrontendController
{
    public function getIndex()
    {
        return View::make('frontend/homes/index');
    }
}