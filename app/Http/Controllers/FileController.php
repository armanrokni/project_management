<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

use App\File;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
     public function insert(Request $request){

        $this->validate($request,
        [
            'project_id'=>'required',
            'filename' => 'required|file',
        ]);
        $fileName = $request->file('filename')->getClientOriginalName();
        $filepath =  $request->file('filename')->store('projects', 'public');
        $file=new File();
        $file->project_id = $request->project_id;
        $file->fileName = $fileName;
        $file->filePath = $filepath;
        $file->save();

        return back()->with('success','درج با موفقیت انجام شد')->with('section', 'file');  
    }

    public function delete(Request $request){

        $one = File::find($request->id);
        $f = Storage::delete('public/'.$one->filePath);
        if($one){
            $one->delete();
        return back()->with('success','حذف با موفقیت انجام شد')->with('section', 'file');
        }
    }
}
