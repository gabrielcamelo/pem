<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(8);
        return view('Admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('Admin.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = Category::create($request->all());
        return redirect()->route('Categories.edit', $category->id)->with('info', 'Categoria criada com sucesso');
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('Admin.categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('Admin.categories.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = Category::find($id);
        $category->fill($request->all())->save();
        return redirect()->route('Categories.edit', $category->id)->with('info', 'Categoria atualizada com sucesso');
    }

    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        return back()->with('info', 'Categoria deletada');
    }
}
