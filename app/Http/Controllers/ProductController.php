<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use PDF;

class ProductController extends Controller
{
    public function productList()
    {
        try {
            $products = Product::all();
            $categories = Category::all();



            return view('admin.product.product', [
                'products'          => $products,
                'categories'        => $categories,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function productEdit($id)
    {
        try {
            $product = Product::findOrFail($id);
            $categories = Category::all();

            return view('admin.product.editProduct', [
                'product'       => $product,
                'categories'    => $categories,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function productStore(Request $request)
    {

        try {
            if (Product::where('model', $request->model)->exists()) {
                $notification = array(
                    'message' => 'Product Already Exists!',
                    'alert-type' => 'error',
                );

                return back()->with($notification);
            } else {


                $product = new Product();
                $product->title = $request->title;
                $product->series = $request->series;
                $product->details = $request->details;
                $product->model = $request->model;
                $product->category = $request->category;
                $product->brand = $request->brand;
                $product->origin = $request->origin;
                $product->country_of_manufacturing = $request->country_of_manufacturing;
                $product->base_unit = $request->base_unit;
                $product->current_price = $request->current_price;
                $product->current_stock = $request->current_stock;
                $product->stock_limit = $request->stock_limit;
                $product->save();


                $notification = array(
                    'message' => 'Product Added',
                    'alert-type' => 'success',
                );

                return back()->with($notification);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function productUpdate(Request $request)
    {
        try {
            $product = Product::findOrFail($request->id);
            $product->title = $request->title;
            $product->series = $request->series;
            $product->details = $request->details;
            $product->model = $request->model;
            $product->category = $request->category;
            $product->brand = $request->brand;
            $product->origin = $request->origin;
            $product->country_of_manufacturing = $request->country_of_manufacturing;
            $product->base_unit = $request->base_unit;
            $product->current_price = $request->current_price;
            $product->current_stock = $request->current_stock;
            $product->stock_limit = $request->stock_limit;
            $product->update();


            $notification = array(
                'message' => 'Product Updated',
                'alert-type' => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function productView($id)
    {
        try {
            $product = Product::findOrFail($id);
            return view('admin.product.view', [
                'product'       => $product,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function search(Request $request)
    {
        try {
            $data = $request->all();

            $products = Product::where(function ($q) use ($data) {
                if (!empty($data) && $data['q'] != '' && $data['q'] != 'undefined') {
                    $q->where(function ($q) use ($data) {
                        $q->where('model', 'like', '%' . $data['q'] . '%');
                        $q->orWhere('brand', 'like', '%' . $data['q'] . '%');
                        $q->orWhere('origin', 'like', '%' . $data['q'] . '%');
                        $q->orWhere('title', 'like', '%' . $data['q'] . '%');
                        $q->orWhere('series', 'like', '%' . $data['q'] . '%');
                    });
                }
            })->get();

            return view('admin.product.searchProduct', [
                'products' => $products,
            ]);

            return $products;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function productDownload()
    {
        $products = Product::all();

        $pdf = Pdf::loadView('admin.product.download', [
            'products'          => $products,
        ]);

        return $pdf->download('product.pdf');
    }
}
