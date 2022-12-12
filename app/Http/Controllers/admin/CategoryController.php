<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{AddCategoryRequest, EditCategoryRequest};
use App\Models\Category;
use DB;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $data['category'] = Category::where('name', 'like', '%'.$request->q.'%')->get();
        return view('admin.category.index', $data);
    }

    public function create(AddCategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->parent = $request->parent;
        $category->save();

        return redirect()->back()->with('message', 'Đã thêm danh mục thành công!');
    }

    public function edit($id)
    {
        $data['category'] = Category::all();
        $data['cate'] = Category::find($id);

        return view('admin.category.edit', $data);
    }

    public function update(EditCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->parent = $request->parent;
        $category->save();

        return redirect()->back()->with('message', 'Đã sửa danh mục thành công!');
    }

    public function destroy($id)
    {
        Category::where('parent', $id)->update(['parent' => 0]);
        Category::destroy($id);
        return redirect()->back()->with('message', 'Đã xoá danh mục thành công!');
    }
}
