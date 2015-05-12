<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/11/2015
 * @Time: 5:03 PM
 */

namespace Funny\Services\Forms;


class CategoryForm extends AbstractForm
{
    /**
     * The validation rules to validate the input data against.
     *
     * @var array
     */
    protected $rules = [
        'title' => 'required',
        'description' => 'required|min:4'
    ];

}