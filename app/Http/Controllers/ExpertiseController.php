<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exceptions;

use Illuminate\Support\Facades\Validator;

use App\Expertise;

class ExpertiseController extends Controller
{
    //
    public function show()
    {
        return view('admin.expertise.show' , ['expertises' => Expertise::paginate(5)]);
    }
    public function add(Request $request)
    {
        Validator::make($request->all() , [
            'title' => 'required|max:50|unique:expertises,title'
        ])->validate();

        $expertise = new Expertise($request->all());
        $expertise->save();

        return back()->with('success' , 'اطلاعات با موفقیت ثبت شد.');

    }
    public function edit($id)
    {
        if(Expertise::find($id)){
            
        }else{
            return back()->with('message' , 'اطلاعاتی برای ویرایش وجود ندارد.');
        }
    }
    public function update(Request $request , $id)
    {

    }
    public function delete($id)
    {

    }
}
