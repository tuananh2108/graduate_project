<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{AddCategoryRequest, EditCategoryRequest};
use App\Models\{Category, Product};

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
        if(Category::where('name', $request->name)->first())
            $category->deleted_at = NULL;
        else
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
        if(Category::where('name', $request->name)->first())
            $category->deleted_at = NULL;
        else
            $category->name = $request->name;
        $category->parent = $request->parent;
        $category->save();

        return redirect()->back()->with('message', 'Đã sửa danh mục thành công!');
    }

    public function destroy($id)
    {
        $child_categories = Category::where('parent', $id)->get();
        if(count($child_categories) > 0) {
            foreach($child_categories as $category) {
                Product::where('category_id', $category->id)->delete();
                $category->delete();
            }
        }
        Category::destroy($id);
        return redirect()->back()->with('message', 'Đã xoá danh mục thành công!');
    }
}
