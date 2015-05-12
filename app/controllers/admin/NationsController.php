<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/12/2015
 * @Time: 4:34 PM
 */

namespace Admin;


use Funny\Repositories\NationRepositoryInterface;
use View;
use Redirect;

class NationsController extends AdminController
{
    protected $objNation;

    public function __construct(NationRepositoryInterface $nation)
    {
        parent::__construct();
        $this->objNation = $nation;
    }

    public function getIndex()
    {
        $nations = $this->objNation->findAll();
        return View::make('admin/nations/index', compact('nations'));
    }

    public function postIndex()
    {
        $form = $this->objNation->getForm();

        if (!$form->isValid()) {
            return Redirect::route('admin.nations.index')->withErrors($form->getErrors())->withInput();
        }
        $category = $this->objNation->create($form->getInputData());
        return Redirect::route('admin.nations.index');
    }

    public function getView($id)
    {
        $nation = $this->objNation->findById($id);
        return View::make('admin.nations.edit', compact('nation'));
    }

    public function postView($id)
    {
        $form = $this->objNation->getForm();
        if (!$form->isValid()) {
            return Redirect::route('admin.nations.view', $id)
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $category = $this->objNation->update($id, $form->getInputData());

        return Redirect::route('admin.nations.view', $id);
    }
}