<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function category_page(){
        $categories = Category::all();
        return view('Category.View')->with('category',$categories);
    }
    public function add_category_page(){
        return view('Category.Add');
    }

    public function add_category(Request $request){

    
        Category::create([
            'category_name'=> $request->category_name
        ]);

        return redirect(route('add_category_page'));
    }

    public function delete_category($id){
        Category::destroy($id);
        return redirect(route('category_page'));
    }

}
