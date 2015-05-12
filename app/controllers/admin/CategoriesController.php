<?php
namespace Admin;

use Input;
use Funny\Repositories\CategoryRepositoryInterface;
use View;
use Redirect;

class CategoriesController extends AdminController
{

    /**
     * Category repository.
     *
     * @var \Funny\Repositories\CategoryRepositoryInterface
     */
    protected $categories;


    /**
     * Create new CategoriesController instance.
     *
     * @param \Funny\Repositories\CategoriesRepositoryInterface $categories
     *
     */
    public function __construct(CategoryRepositoryInterface $categories)
    {
        parent::__construct();
        $this->categories = $categories;
    }

    public function getIndex()
    {
        $categories = $this->categories->findAll();

        return View::make('admin/categories/index', compact('categories'));
    }


    public function postIndex()
    {
        $form = $this->categories->getForm();

        if (!$form->isValid()) {
            return Redirect::route('admin.categories.index')->withErrors($form->getErrors())->withInput();
        }
        $category = $this->categories->create($form->getInputData());
        return Redirect::route('admin.categories.index');
    }


    public function getView($id)
    {
        $category = $this->categories->findById($id);

        return View::make('admin.categories.edit', compact('category'));
    }

    /**
     * Delete a category from the database.
     *
     * @param  mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($id)
    {
        $this->categories->delete($id);

        return Redirect::route('admin.categories.index')->with('success', '');
    }
}