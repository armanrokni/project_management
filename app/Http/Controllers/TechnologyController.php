<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Technology;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{
    public function show()
    {
        return view('admin.technology.show', ['technologies' => Technology::paginate(5)]);
    }
    public function add(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|max:50|unique:technologies,title',
            'icon'  => 'required|max:100|image|file'
        ])->validate();

        $tech = new Technology();
        $tech->icon = $request->file('icon')->store('icons' , 'public');
        $tech->title = $request->title;
        $tech->save();

        Session::flash('success' , 'اطلاعات با موفقیت ذخیره شد.');
        return back();
    }
    public function edit($id)
    {
        if($tech = Technology::find($id)){
            return view('admin.technology.edit' , ['technology' => $tech]);
        }else{
            Session::flash('message' ,'اطلاعاتی برای ویرایش وجود ندارد.');
            return back();
        }
    }
    public function update(Request $request , $id)
    {   
        if($tech = Technology::find($id)){
            Validator::make($request->all(),[
                'title' => 'required|max:50|unique:technologies,title,'.$id,
                'icon'  => 'max:100|image'
            ])->validate();
    
            if($request->hasFile('icon')){
                Storage::delete('public/'.$tech->icon);
                $tech->icon = $request->file('icon')->store('icons' , 'public');
            }
            $tech->title = $request->title;
            $tech->save();
            return redirect('technology');
        }else{
            Session::flash('message' ,'اطلاعاتی برای ویرایش وجود ندارد.');
            return redirect('technology');
        }
    }
    public function delete($id)
    {
        if($tech = Technology::find($id)){
            Storage::delete('public/'.$tech->icon);
            $tech->destroy($id);
            Session::flash('successMessage' , 'اطلاعات با موفقیت حذف شد.');
            return back();
        }else{
            Session::flash('message' , 'اطلاعاتی برای حذف وجود ندارد.');
            return back();
        }
    }
}
