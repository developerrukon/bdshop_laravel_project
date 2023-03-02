<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //product display all
    public function index(){
        $products = Product::all();
        return view('backend.product.index', compact('products'));
    }
    public function create(){
        $categorys = Category::all();
        return view('backend.product.create', compact('categorys'));
    }
//product store
    public function store(Request $request){
        $img = $request->file('image');
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:255',
            'category' => 'required',
            'price' => 'required',
            'discount_price' => 'nullable',
            'quantity' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        if($img){
            $image_name = time().'.'.$img->extension();
            $upload = $request->image->move('product', $image_name);
            if($upload){
                Product::create([
                    'title' => $request->title,
                    'price' => $request->price,
                    'discount_price' => $request->discount_price,
                    'category' => $request->category,
                    'quantity' => $request->quantity,
                    'description' => $request->description,
                    'image' => $image_name,
                ]);
                return redirect(route('backend.product.index'))->with('message', 'Product Add Successful.!');

            }else{
                return back()->with('error', "Image Not Uploaded!");
            }
        }
    }
//product edit
    public function edit($id){
        $product = Product::find($id);
        return view('backend.product.edit', compact('product'));
    }
//product update
    public function update(Request $request, $id){
        $product = Product::find($id);
        $img = $request->file('image');
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:255',
            'category' => 'required',
            'price' => 'required',
            'discount_price' => 'nullable',
            'quantity' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        if($img){
            $image_name = time().'.'.$img->extension();
            if(file_exists(public_path('product'.$product->image))){
                $product->delete();
                $request->image->move('product', $image_name);
            }
        }else{
            $image_name = $product->image;
        }
        $product->Update([
            'title' => $request->title,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'image' => $image_name,
        ]);
        return redirect(route('backend.product.index'))->with('message', 'Product Update Successful.!');

        }
//product delete
        public function destroy($id){
            $product = Product::find($id);
            $product->delete();
            return back()->with('message', "Product Delete Successful!");
        }
}
