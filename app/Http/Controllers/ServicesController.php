<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Documents;

class ServicesController extends Controller
{
    public function services($id){
        return view('services')->with('id', $id);
    }

    public function servicesAdmin(){
        return view('admin\services');
    }

    public function servicesAddAdmin(Request $request){
        $docs = '<ul>';
        $documents = Documents::all();
        foreach ($documents as $document){
        if (isset($_POST["document_".$document->documents_id])){
            $docs.='<li>';
            $docs.= $document->documents;
            $docs.='</li>';
        }
        }
        $docs.='</ul>';

        $request->validate([
            'name' => 'required|max:100',
            'content' => 'required',
            'image' => 'required|mimes:jpg,png|max:16000'
        ]);

        $image = time()."_Service_image.".$request->file('image')->getClientOriginalExtension();
        $path = 'uploads/admin/services';
        $store = $request->file('image')->storeAs('public/'.$path, $image);

        $service = new Services;
        $service->name = $request['name'];
        $service->content = $request['content'];
        $service->documents = $docs;
        $service->image = $path."/".$image;
        $service-> save();
        return redirect('admin\services')->with('alert','Service has been added');
    }

    public function servicesDeleteAdmin($id){
        $service = Services::find($id);
        if(!is_null($service)){
            $service->delete();
        }
        return redirect('admin/services');
    }

    public function servicesEditAdmin($id){
        $changes = Services::find($id);
        if(!is_null($changes)){
            $data = compact('changes');
            return view('admin\services')->with($data);
        }
    }

}
