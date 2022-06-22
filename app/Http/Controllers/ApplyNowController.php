<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class ApplyNowController extends Controller
{
    public function apply(){
        return view('applyNow');
    }

    public function application(Request $request){
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required|integer|max:9999999999|min:1000000000',
                'occupation' => 'required|max:1000',
                'requirement' => 'not_in:0',
                'category' => 'not_in:0',
                'current_address' => 'required|max:600'
            ]
            );

        $inquiry = new Inquiry;
        $inquiry->first_name = $request['first_name'];
        $inquiry->last_name = $request['last_name'];
        $inquiry->email = $request['email'];
        $inquiry->phone_number = $request['phone_number'];
        $inquiry->occupation = $request['occupation'];
        $inquiry->gender = $request['gender'];
        $inquiry->requirement = $request['requirement'];
        $inquiry->category = $request['category'];
        $inquiry->current_address = $request['current_address'];
        $inquiry->save();
        return redirect('apply')->with('alert', 'Your inquiry has been submitted');
    }

    public function applyAdmin(){
        $applynow_info = Inquiry::paginate(10);
        $data = compact('applynow_info');
        return view('admin\applyNow')->with($data);
    }

    public function deleteAdmin($id){
        $applynow = Inquiry::find($id);
        if(!is_null($applynow)){
            $applynow->delete();
        }
        return redirect('admin\apply');
    }
    public function viewAdmin($id){
        $changes = Inquiry::find($id);
        if(!is_null($changes)){
            $data = compact('changes');
            p($data);
            die;
            return view('admin\apply')->with($data);
        }
    }
}
