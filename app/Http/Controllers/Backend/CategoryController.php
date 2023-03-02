<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $categorys = Category::all();
        return view('backend.category.index', compact('categorys'));
    }
    public function store(Request $request){
        $data = new Category;
        $data->category_name = $request->category;
        $data->save();
        return back()->with('message', 'Category Create Successful!');
    }
    public function destroy($id){
        $date =  Category::find($id);
        $date->delete();
        return redirect()->back()->with('message', "Category Delete Successful.!");
    }
}
