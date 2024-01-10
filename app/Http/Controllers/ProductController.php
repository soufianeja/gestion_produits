<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function add_category(){
        return view('products.add_category');
    }

    public function add_product(){
        $categories = Category::all();
        return view('products.add_product', compact('categories'));
    }

    public function store_category(Request $request){
        $request->validate([
            'name'=> 'required',
        ]);
        $category = new Category();
        $category->name =$request->name;
        $category->save();
        return redirect('/add_category')->with('status', 'category added successfuly');
    }

    public function store_product(Request $request){
        $request->validate([
            'name'=> 'required',
            'category_id' => 'required',
            'price' => 'integer | required',
        ]);
        $product = new Product();
        $product->name =$request->name;
        $product->category_id =$request->category_id;
        $product->price =$request->price;
        $product->save();
        return redirect('/add_product')->with('status', 'product added successfuly');
    }

    public function show_products(){
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('/products.show_products',compact('products','categories'));
    }

    public function show_products_per_cat($id){
        $products = Product::where('category_id',$id)->get();
        return view('/products.show_products_per_cat',compact('products'));
    }

    public function delete_product($id)
    {
        $product= Product::find($id);
        $product ->delete();
        return redirect()->back()->with('status','product deleted succesfuly!');
    }

    public function update_product($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('/products.update_product',compact('product','categories'));
    }

    public function update_product_traitement(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'integer | required',
            'category_id' => 'required',
        ]);
        
        $product = Product::find($request->id);
        if ($product) {
            $product->update([
                'name'=>$request->name,
                'price'=>$request->price,
                'category_id'=>$request->category_id
                ]);
                return redirect('/show_products')->with('status','product modified succesfuly.');
        }



    }
}
