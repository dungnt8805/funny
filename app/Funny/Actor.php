<?php
/**
 * Created by PhpStorm.
 * User: nguyentuan
 * Date: 5/12/2015
 * Time: 10:01 PM
 */

namespace Funny;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Actor extends Model
{

    protected $table = 'actors';
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
}