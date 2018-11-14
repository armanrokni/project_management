<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exceptions;

use Illuminate\Support\Facades\Validator;

class ExpertiseController extends Controller
{
    //
    public function show()
    {
        return view('admin.expertise.show' , ['expertises' => Expertise::get()]);
    }
    public function add(Request $request)
    {
        Validator::make($request->all() , [
            'title' => 'required|max:50'
        ]);
    }
    public function edit($id)
    {

    }
    public function update(Request $request , $id)
    {

    }
    public function delete($id)
    {

    }
}
