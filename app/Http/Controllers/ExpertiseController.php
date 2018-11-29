<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exceptions;

use Illuminate\Support\Facades\Validator;

use App\Expertise;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Redirect;


class ExpertiseController extends Controller
{
    public function show()
    {
        return view('admin.expertise.show', ['expertises' => Expertise::paginate(5)]);
    }
    public function add(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|max:50|unique:expertises,title'
        ])->validate();

        $expertise = new Expertise($request->all());
        $expertise->save();

        return back()->with('success', 'اطلاعات با موفقیت ثبت شد.');

    }
    public function edit($id)
    {
        if($expertise = Expertise::find($id)){
            return view('admin.expertise.edit', compact('expertise'));
        }else{
            Session::flash('message', 'اطلاعاتی برای ویرایش وجود ندارد.');
            return back();
        }
    }
    public function update(Request $request, $id)
    {
        if($expertise = Expertise::find($id)){
            Validator::make($request->all(), [
                'title' => 'required|max:50|unique:expertises,title,'.$id
            ])->validate();

            $expertise->title = $request->title;
            $expertise->save();

            return redirect('expertise');

        }else{

            Session::flash('message', 'اطلاعاتی برای ویرایش وجود ندارد.');
            return redirect('expertise');

        }
    }
    public function delete($id)
    {
        if(Expertise::find($id)){
           Expertise::destroy($id);
           Session::flash('successMessage', 'فیلد مورد نظر حذف شد.'); 
           return redirect('expertise');
        }else{
            Session::flash('message', 'فیلدی با این مشخصات برای حذف وجود ندارد.');
            return redirect('expertise');
        }
        
    }
}
