<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/12/2015
 * @Time: 4:46 PM
 */

namespace Funny\Services\Forms;


class NationForm extends AbstractForm
{
    protected $rules = ['name' => 'required'];
}