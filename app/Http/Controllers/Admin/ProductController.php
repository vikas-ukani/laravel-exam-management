<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::where('is_active', true)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAddRequest $request)
    {
        $userId = auth()->user()->id;
        $input = $request->all(['name', 'category_id', 'price', 'description']) + ['user_id' => $userId];

        if ($request->image != '') {
            //upload new file
            try {
                $file = $request->image;
                $filename = uniqid() . $file->getClientOriginalName();
                $dirPath = '/uploads/images/';
                $path = public_path() . $dirPath;
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }
                $fullImageName = "{$dirPath}{$filename}";
                $file->move($path, $filename);
                $input['image'] = $fullImageName;
            } catch (\Exception $e) {
                return view('admin.products.create')->with('error', __($e->getMessage()));
            }
        }
        Product::create($input);
        $categories = Category::where('is_active', true)->get();
        return redirect()->back()->with('success', __('Product added!'))->with('categories', $categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
