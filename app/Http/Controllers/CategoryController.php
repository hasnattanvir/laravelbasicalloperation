<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use App\Models\Category;
use Auth;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function AllCat(){

        // $category = DB::table('categories')
        //         ->join('users', 'categories.user_id', 'users.id')
        //         ->select('categories.*','users.name')
        //         ->latest()->paginate(5);


        // orm
        $category = Category::latest()->paginate(5);
        $trachCat = Category::onlyTrashed()->latest()->paginate(3);

        // query bulder
        // $category = DB::table('categories')->latest()->paginate(5);


        return view('admin.category.index',compact('category','trachCat'));
    }

    public function AddCat(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],[
            'category_name.required' => 'please input Category name',
            'category_name.max' => 'please input data max value 255',
        ]);

        // ORM
        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now()
        // ]);


        // popetional format
        
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();

        // query bulder
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);

       return redirect()->back()->with('Success','Category Inserted Successfull');
    }


    public function Edit($id){

        // query builder
        $category = DB::table('categories')->where('id',$id)->first();

        // orm
        // $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function Update(Request $request, $id){
        //orm
        // $update = Category::find($id)->update([
        //     'category_name' => $request->category_name,
        //     'user_id'=>Auth::user()->id
        // ]);

        //query builder
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);

        return redirect()->route('all.category')->with('Success','Category Update Successfull');

    }


    public function SoftDelete($id){
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('Success','Move To Trash');
    }

    public function Restore($id){
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('Success','Category Restore Successfull');

    }

    public function Remove($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('Success','Category Parmanently Deleted');

    }
}
