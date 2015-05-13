<?php
/**
 * Created by PhpStorm.
 * User: nguyentuan
 * Date: 5/12/2015
 * Time: 10:13 PM
 */

namespace Funny\Services\Forms;


class FilmForm extends AbstractForm
{
    protected $rules = ['title' => 'required', 'eng_title' => 'required', 'durations' => "required", 'year' => 'required|integer', 'thumbnail' => 'required'];
}