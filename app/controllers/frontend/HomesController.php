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
use Funny\Film;

class HomesController extends FrontendController
{
    
    public function getIndex()
    {
        $data = [];
        $films['series']['new'] = Film::where('multi','!=',0)->orderBy('id','DESC')
            ->select('id','title','slug','durations','quality','year','thumbnail')
            ->take(10)->get();
        $films['series']['finish'] = Film::where('multi','=',2)->orderBy('updated_at','DESC')
            ->select('id','title','slug','durations','quality','year','thumbnail')->take(10)->get();
        $films['movies']['new'] = Film::where('multi','=',0)->orderBy('id','DESC')
            ->select('id','title','slug','durations','quality','year','thumbnail')->take(10)->get();
        $films['suggest'] = Film::where('hot','=',1)->orderBy('id','DESC')
            ->select('id','title','slug','durations','quality','year','thumbnail')->take(10)->get();
        $data['films'] = $films;
        return View::make('frontend/homes/index',compact('data'));
    }
    
    
}