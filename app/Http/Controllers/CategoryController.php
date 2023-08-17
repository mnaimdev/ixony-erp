<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use Image;

class CategoryController extends Controller
{
    function category()
    {

        try {
            $categories = Category::all();
            return view('admin.category.category', [
                'categories' => $categories,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    function categoryStore(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required|unique:categories',
            ]);


            $category = new Category();
            $category->name = $request->name;
            $category->created_at = Carbon::now();
            $category->save();


            return back()->with(['alert-type' => 'success', 'message' => 'Category Added']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    function categoryDelete($id)
    {
        try {

            $category = Category::findOrFail($id);
            $category->delete();

            return back()->with(['alert-type' => 'success', 'message' => 'Category Deleted']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    function categoryEdit($id)
    {
        try {
            $category = Category::findOrFail($id);

            return view('admin.category.editCategory', [
                'category' => $category,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    function categoryUpdate(Request $request)
    {
        try {

            $category = Category::findOrFail($request->id);
            $category->name = $request->name;
            $category->created_at = Carbon::now();
            $category->update();

            return back()->with(['alert-type' => 'success', 'message' => 'Category Updated']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function categoryProduct($name)
    {
        try {
            $products = Product::where('category', $name)->get();

            return view('admin.category.categoryProduct', [
                'products'      => $products,
                'name'          => $name,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
