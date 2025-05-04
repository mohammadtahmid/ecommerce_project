<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view('admin.category', compact("data"));
    }

    public function add_category(Request $request){
        try{
            $request->validate([
                'category' => 'required|string|max:250|unique:categories,category_name',
            ]);
            $category = new Category;

            $category->category_name = $request->category;

            $category->save();
            flash()->option('timeout', 3000)->success('Category has been Inserted!');
            return redirect()->back();
        } catch(validationException $e){
            flash()->option('timeout', 4000)->error($e->validator->errors()->first());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

    }
}
