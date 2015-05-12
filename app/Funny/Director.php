<?php
/**
 * Created by PhpStorm.
 * User: nguyentuan
 * Date: 5/12/2015
 * Time: 10:02 PM
 */

namespace Funny;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Director extends Model
{
    protected $table = 'directors';
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
}