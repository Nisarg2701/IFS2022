<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonials;
use App\Models\Principals;
use App\Models\Awards;

class AboutUsController extends Controller
{
    public function about(){
        return view('aboutUs');
    }

    public function awardsAdmin(){
        return view('admin\awards');
    }

    public function awardsAddAdmin(Request $request){
        $request->validate([
            'name' => 'required|max:100',
            'image' => 'required|mimes:png,jpg|max:16000',
            'description' => 'required|max:1000'
        ]);

        $image = time()."_award_image.".$request->file('image')->getClientOriginalExtension();
        $path = 'uploads/admin/awards';
        $request->file('image')->storeAs('public/'.$path, $image);

        $awards = new Awards;
        $awards->name = $request['name'];
        $awards->image = $path."/".$image;
        $awards->description = $request['description'];
        $awards->save();
        return redirect('admin/about/awards')->with('alert', 'Award has been Added');
    }

    public function awardsEditAdmin($id){
        $changes = Awards::find($id);
        if(!is_null($changes)){
            $data = compact('changes');
            return view('admin\awards')->with($data);
        }
    }

    public function awardsUpdateAdmin($id, Request $request){
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:1000'
        ]);

        $award = Awards::find($id);
        $award->name = $request['name'];
        $award->description = $request['description'];
        $award->save();

        return redirect('admin/about/awards')->with('alert', 'Award has been Updated');
    }

    public function awardsDeleteAdmin($id){
        $award = Awards::find($id);
        if(!is_null($award)){
            $award->delete();
        }
        return redirect('admin/about/awards');
    }

    public function principalsAdmin(){
        return view('admin\principals');
    }

    public function principalsAddAdmin(Request $request){
        $request->validate([
            'name'=> 'required|max:100',
            'image' => 'required|mimes:jpg,png|max:16000'
        ]);

        $image = time()."_principal_image.".$request->file('image')->getClientOriginalExtension();
        $path = 'uploads/admin/principal';
        $store = $request->file('image')->storeAs('public/'.$path, $image);

        $principal = new Principals;
        $principal->name = $request['name'];
        $principal->image = $path."/".$image;
        $principal-> save();
        return redirect('admin/about/principals')->with('alert', 'Principal has been Added');
    }

    public function principalsDeleteAdmin($id){
        $principal = Principals::find($id);
        if(!is_null($principal)){
            $principal->delete();
        }
        return redirect('admin/about/principals');
    }

    public function testimonialsAdmin(){
        return view('admin\testimonials');
    }

    public function testimonialsAddAdmin(Request $request){
        $request->validate([
            'name' => 'required|max:100',
            'image' => 'required|mimes:jpg,png|max:16000',
            'testimonial' => 'required|max:500'
        ]);

        $image = time()."_testiminial_image.".$request->file('image')->getClientOriginalExtension();
        $path = 'uploads/admin/testimonials';
        $store = $request->file('image')->storeAs('public/'.$path, $image);
        $testimonial = new Testimonials;
        $testimonial->name = $request['name'];
        $testimonial->testimonials = $request['testimonial'];
        $testimonial->visibility = 'no';
        $testimonial->image = $path."/".$image;
        $testimonial->save();
        return redirect('admin/about/testimonials')->with('alert', 'Testimonial has been Added');
    }

    public function testimonialsEditAdmin($id){
        $changes = Testimonials::find($id);
        if(!is_null($changes)){
            $data = compact('changes');
            return view('admin\testimonials')->with($data);
        }
    }

    public function testimonialsDeleteAdmin($id){
        $testimonial = Testimonials::find($id);
        if(!is_null($testimonial)){
            $testimonial->delete();
        }
        return redirect('admin/about/testimonials');
    }

    public function testimonialsVisibilityAdmin($id){
        $testimonial = Testimonials::find($id);
        if($testimonial->visibility=="yes"){
            $testimonial->visibility = "no";
        }
        else{
            $testimonial->visibility = "yes";
        }
        $testimonial->save();
        return redirect('admin/about/testimonials');
    }

    public function testimonialsUpdateAdmin($id, Request $request){
        $request->validate([
            'name' => 'required|max:100',
            'testimonial' => 'required|max:500'
        ]);

        $testimonial = Testimonials::find($id);
        $testimonial->name = $request['name'];
        $testimonial->testimonials = $request['testimonial'];
        $testimonial->save();

        return redirect('admin/about/testimonials')->with('alert', 'Testimonial has been Updated');
    }
}
