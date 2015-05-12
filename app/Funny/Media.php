<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/11/2015
 * @Time: 2:40 PM
 */

namespace Funny;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Media extends Model
{
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}