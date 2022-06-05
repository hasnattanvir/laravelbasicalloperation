<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Image;


class MultiPhotoController extends Controller
{
public function AllMultiImage(){
    $images = Multipic::latest()->paginate(5);
    return view('admin.multipic.index',compact('images'));
}

public function StoreImage(Request $request){

    $request->validate([
        'image' => 'required|mimes:jpg,png,jpeg,gif,svg',
    ]);

    $image = $request->file('image');

    foreach($image as $multi_img){

        $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
        Image::make($multi_img)->resize(300,200)->save('image/multiphoto/'.$name_gen);
        $last_img = 'image/multiphoto/'.$name_gen;

        // insert data
        Multipic::insert([
            'image'=>$last_img,
            'created_at' =>Carbon::now()
        ]);
    }
        // end foreach loop
    return Redirect()->back()->with('Success','Multi Image Inserted Successfully');
}


}
