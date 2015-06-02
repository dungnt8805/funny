<?php
namespace Frontend;

use BaseController;
use Input;
use Funny\Film;
use Funny\Category;
use Funny\Nation;
use View;
class FilmsController extends FrontendController{

    public function getIndex(){
        $is_series = Input::get('is_series',0);
        $is_movies = Input::get('is_movies',0);
        $category_slug = Input::get('category','');
        $country_slug = Input::get('country','');
        
        $appends = [];
        $query = Film::where('status','=',1);
        if($is_movies == 1){
            $appends['is_movies'] = 1;
            $query = $query->where('multi','!=',0);
        }else if($is_movies == 1){
            $query = $query->where('multi','=',0);
        }
        if($category_slug != '' && !is_null($category = Category::where('slug','=',$category_slug)->where('status','=',1)->first())){
            $appends['category'] = $category_slug;
            $query = $query->leftJoin('films_categories','films_categories.film_id','=','films.id')->where('films_categories.category_id','=',$category->id);
        }
        
        if($country_slug !='' && !is_null($country = Nation::where('code','=',$country_slug)->where('has_film','=',1)->first())){
            $appends['country'] = $country_slug;
            $query = $query->where('nation_id','=',$country->id);
        }
        
        $films = $query->paginate(24)->appends($appends);
        
        $data['films'] = $films;
        return View::make('frontend/films/index',compact('data'));
    }
    
    public function getDetails(){
        
    }
    
}
?>