<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
class HomeController extends Controller
{
    public function home(){
        return view('home');
    }

    public function homeAdmin(){
        return view('admin\home');
    }

    public function homeAddAdmin(Request $request){
        $request->validate([
            'image' => 'required|mimes:png,jpg|max:160000'
        ]);
        $image = time()."_home_image.".$request->file('image')->getClientOriginalExtension();
        $path = 'uploads/admin/home';
        $store = $request->file('image')->storeAs('public/'.$path, $image);

        $home = new Home;
        $home->image = $path."/".$image;
        $home-> save();
        return redirect('admin/')->with('alert','Service has been added');
    }

    public function homeVisibilityAdmin($id){
        $home = Home::find($id);
        if($home->visibility=="yes"){
            $home->visibility = "no";
        }
        else{
            $home->visibility = "yes";
        }
        $home->save();
        return redirect('admin/');
    }
}
