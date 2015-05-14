<?php
namespace Funny;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Film extends Model{
    protected $table = 'films';
    use SoftDeletingTrait;
    protected $dates = ['created_at'];
}