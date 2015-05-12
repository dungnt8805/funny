<?php
/**
 * Created by PhpStorm.
 * User: nguyentuan
 * Date: 5/12/2015
 * Time: 10:03 PM
 */

namespace Funny;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Manufacturer extends Model
{
    protected $table = 'manufacturers';
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
}