<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/12/2015
 * @Time: 3:11 PM
 */

namespace Funny;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Episode extends Model
{
    protected $table = 'episodes';
    use SoftDeletingTrait;
    protected $dates = ['created_at'];

    public function film()
    {
        return $this->belongsTo('Film', 'film_id', 'id');
    }
}