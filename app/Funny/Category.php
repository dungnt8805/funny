<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/11/2015
 * @Time: 2:18 PM
 */

namespace Funny;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends Model
{
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}