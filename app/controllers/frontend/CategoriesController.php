<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/21/2015
 * @Time: 5:00 PM
 */

namespace Frontend;

use View;

class CategoriesController extends FrontendController
{
    public function getSlug()
    {
        return View::make('frontend/homes/index');
                                                     }
}