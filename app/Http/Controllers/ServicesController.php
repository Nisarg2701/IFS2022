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
        $docs='<ul class="content">';
        $content ='<h1 class="container text-3xl font-medium title-font text-white mb-12 aboutus-heading">Service Information</h1>';
        $content.='<div class="container"><p class="aboutus-info text-white text-justify">';
        $documents = Documents::all();
        foreach ($documents as $document){
        if (isset($_POST["document_".$document->documents_id])){
            $docs.='<li class="content text-white">';
            $docs.= $document->documents;
            $docs.='</li>';
        }
        }
        $docs.='</ul>';
        $content.=$request['content'];
        $content.='</p></div>';
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
        $service->content = $content;
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

    public function servicesUpdateAdmin($id, Request $request){
        $request->validate([
            'name' => 'required|max:100',
            'content' => 'required',
            'document' => 'required'
        ]);

        $service = Services::find($id);
        if(isset($request->image)){
            unlink('storage/'.$service->image);
            $image = time()."_Service_image.".$request->file('image')->getClientOriginalExtension();
            $path = 'uploads/admin/services';
            $store = $request->file('image')->storeAs('public/'.$path, $image);
            $service->image = $path."/".$image;
        }
        $service->name = $request['name'];
        $service->content = $request['content'];
        $service->documents = $request['document'];
        $service-> save();
        return redirect('admin\services')->with('alert','Service has been updated');
    }

    public function documentsAdmin(){
        return view('admin\documents');
    }

    public function documentsAddAdmin(Request $request){
        $request->validate([
            'documents' => 'required'
        ]);
        $documents = new Documents;
        $documents->documents = $request['documents'];
        $documents-> save();
        return redirect('admin/services/documents')->with('alert','Document has been added');
    }

    public function documentsDeleteAdmin($id){
        $documents = new Documents;
        $documents = Documents::find($id);
        if(!is_null($documents)){
            $documents->delete();
        }
        return redirect('admin/services/documents');
    }
}
