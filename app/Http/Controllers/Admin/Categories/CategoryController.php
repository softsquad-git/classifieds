<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CategoryRequest;
use App\Repositories\Admin\Categories\CategoryRepository;
use App\Services\Admin\Categories\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryService
     * @var CategoryRepository
     */
    private $service;
    private $repository;

    public function __construct(CategoryService $service, CategoryRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function items()
    {
        $items = $this->repository->items();

        return view('admin.categories.list', [
            'data' => $items
        ]);
    }

    public function create($category_id = 0)
    {
        $item = $this->service->category();
        $categories = $this->repository->all();
        $item->parent_id = $category_id;

        return view('admin.categories.form', [
            'item' => $item,
            'categories' => $categories
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $this->service->store($request->all());

        return redirect()->action('Admin\Categories\CategoryController@items')
            ->with('admin.panel.saved');
    }

    public function edit($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)) {
            $categories = $this->repository->all();
            return view('admin.categories.form', [
                'item' => $item,
                'categories' => $categories
            ]);
        }

        return redirect()->action('Admin\Categories\CategoryController@items')
            ->with('admin.panel.not_found');
    }

    public function update(CategoryRequest $request, $id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)) {
            $this->service->update($request->all(), $item);

            return redirect()->action('Admin\Categories\CategoryController@items')
                ->with('admin.panel.saved');
        }

        return redirect()->action('Admin\Categories\CategoryController@items')
            ->with('admin.panel.not_found');
    }

    public function delete($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)) {
            $this->service->delete($item);

            return redirect()->action('Admin\Categories\CategoryController@items')
                ->with('admin.panel.saved');
        }

        return redirect()->action('Admin\Categories\CategoryController@items')
            ->with('admin.panel.not_found');
    }

}
