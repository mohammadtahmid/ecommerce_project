<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use tidy;

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

    public function delete_category($id){
        $data = Category::find($id);

        $data->delete();
        flash()->option('timeout', 3000)->warning('Category has been Deleted!');
        return redirect()->back();
    }

    public function edit_category($id){
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request, $id){
        $data = Category::find($id);
        $data->category_name = $request->category;

        $data->save();

        flash()->option('timeout', 3000)->success('Category has been Deleted!');

        return redirect('/view_category');

    }


    //product controller start
    public function add_product(){
        $category = Category::all();
        return view('admin.add_product',compact('category'));
    }

    public function upload_product(Request $request){

        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;
        if($image){

            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }

        $data->save();
        flash()->option('timeout', 3000)->success('Product has been added successfully!');
        return redirect()->back();
    }

    public function view_product(){
        $product = Product::paginate(3);
        return view('admin.view_product',compact('product'));
    }

    public function delete_product($id){

        $data = Product::find($id);

        $image_path = public_path('products/'.$data->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }

        $data->delete();
        flash()->option('timeout', 3000)->info('Product has been Deleted successfully!');
        return redirect()->back();

    }

    public function update_product($id){
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_page',compact('data','category'));
    }

    public function edit_product(Request $request, $id){
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        flash()->option('timeout', 3000)->info('Product has been Updated successfully!');
        return redirect('/view_product');

    }

    //Search Product
    public function product_search(Request $request){
        $search = $request->search;

        $product = Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(3);
        return view('admin.view_product',compact('product'));
    }


}
