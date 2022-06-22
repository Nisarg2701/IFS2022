<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruitment;
use App\Models\RecruitmentInfo;
use Illuminate\Support\Facades\Storage;

class CareersController extends Controller
{
    public function careers(){
        return view('careers');
    }

    public function application(Request $request){
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required|integer|max:9999999999|min:1000000000',
                'job' =>  'not_in:0',
                'current_salary' => 'required|integer',
                'expected_salary' => 'required|integer',
                'resume' => 'required|mimes:pdf|max:300'
            ]
            );
            $fileName = time()."-application_resume.".$request->file('resume')->getClientOriginalExtension();
            $path = $request->file('resume')->storeAs('public/uploads/resume', $fileName);
            $recruitment = new Recruitment;
            $recruitment->first_name = $request['first_name'];
            $recruitment->last_name = $request['last_name'];
            $recruitment->email = $request['email'];
            $recruitment->phone_number = $request['phone_number'];
            $recruitment->job = $request['job'];
            $recruitment->current_salary = $request['current_salary'];
            $recruitment->expected_salary = $request['expected_salary'];
            $recruitment->gender = $request['gender'];
            $recruitment->resume = $path;
            $recruitment->save();

            return redirect('careers')->with('alert', 'Your application has been submitted');
    }

    public function careersApplicationAdmin(){
        $recruitment = Recruitment::paginate(10);
        $data = compact('recruitment');
        return view('admin\careers')->with($data);
    }

    public function careersInformationAdmin(){
        return view('admin\careersInfo');
        }

    public function deleteAdmin($id){
        $recruitment = Recruitment::find($id);
        if(!is_null($recruitment)){
            $recruitment->delete();
        }
        return redirect('admin\careers/application');
    }

    public function downloadAdmin($id){
        $recruitment = Recruitment::find($id);
        if(!is_null($recruitment)){
            $path = $recruitment->resume;
            $name = $recruitment->first_name."_".$recruitment->last_name."_".$recruitment->job."_resume.pdf";
            return Storage::download($path, $name);
        }
    }

    public function editAdmin(Request $request){
        $request->validate([
            "job" => "required",
            "specification" => "required"
        ]);
        $recruitment = new RecruitmentInfo;
        $recruitment->job = $request['job'];
        $recruitment->specification = $request['specification'];
        $recruitment->visibility = "no";
        $recruitment->save();

        return redirect('admin\careers/information')->with('alert', 'Job Requirement has been Updated');
    }

    public function visibilityAdmin($id){
        $recruitment = RecruitmentInfo::find($id);
        if($recruitment->visibility=="yes"){
            $recruitment->visibility = "no";
        }
        else{
            $recruitment->visibility = "yes";
        }
        $recruitment->save();
        return redirect('admin\careers/information');
    }

    public function InformationDeleteAdmin($id){
        $recruitment = RecruitmentInfo::find($id);
        if(!is_null($recruitment)){
            $recruitment->delete();
        }
        return redirect('admin\careers/information');
    }

    public function InformationEditAdmin($id){
        $changes = RecruitmentInfo::find($id);
        if(!is_null($changes)){
            $data = compact('changes');
            return view('admin\careersInfo')->with($data);
        }
    }

    public function updateAdmin($id, Request $request){
        $request->validate([
            "job" => "required",
            "specification" => "required"
        ]);

        $recruitment = RecruitmentInfo::find($id);
        $recruitment->job = $request['job'];
        $recruitment->specification = $request['specification'];
        $recruitment->save();

        return redirect('admin\careers/information')->with('alert', 'Job Requirement has been Updated');
    }
}
