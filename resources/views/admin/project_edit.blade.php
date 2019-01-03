@extends('admin.master.masterpage')
@section('content')

    <div class="card-box">
    	<div class="panel-heading" >
    		<h4 class="m-t-0 header-title">ویرایش اطلاعات پروژه</h4>
    		<p class="text-muted m-b-30 font-18"></p>	
    	</div>	
    	<form class="form-horizontal" method="post" action="{{url('project/edit')}}" > 
            {{csrf_field()}}
            <input type="hidden" value="{{$one->id}}" name="id">

            <div class="form-group">
                <label class="col-md-1 control-label">عنوان پروژه</label>
                <div class="col-md-6">
                    <input name="title" type="text" class="form-control" placeholder="" value="@if(old('title')!=null){{old('title')}}@else {{$one->title}} @endif">
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-1 control-label">تاریخ شروع</label>
                <div class="col-md-6">
                    <input name="startTime" type="text" class="form-control" value="@if(old('startTime')!=null){{old('startTime')}}@else {{$one->startTime}} @endif">
                    @if ($errors->has('startTime'))
                        <span class="help-block">
                            <strong>{{ $errors->first('startTime') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
                                     
            <div class="form-group">
                <label class="col-md-1 control-label">تاریخ پایان</label>
                <div class="col-md-6">
                    <input name="endTime" type="text" class="form-control" placeholder="" value="@if(old('endTime')!=null){{old('endTime')}}@else {{$one->endTime}} @endif">
                    @if ($errors->has('endTime'))
                        <span class="help-block">
                            <strong>{{ $errors->first('endTime') }}</strong>
                        </span>
                    @endif
                </div>
            </div> 
    		
    		<div class="form-group">
                <label class="col-md-1 control-label">نام مشتری</label>
                <div class="col-md-6">
                    <input name="customer" type="text" class="form-control" placeholder="" value="@if(old('customer')!=null){{old('customer')}}@else {{$one->customer}} @endif">
                    @if ($errors->has('customer'))
                        <span class="help-block">
                            <strong>{{ $errors->first('customer') }}</strong>
                        </span>
                    @endif
                </div>
            </div> 
    		
    		<div class="form-group">
                <label class="col-md-1 control-label">هزینه پروژه</label>
                <div class="col-md-6">
                    <input name="price" type="text" class="form-control" placeholder="" value="@if(old('price')!=null){{old('price')}}@else {{$one->price}} @endif">
                    @if ($errors->has('price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                    @endif
                </div>
            </div> 

            <div class="form-group">
                <label class="col-md-1 control-label">وضعیت </label>
                <div class="col-md-6">

                    <div class="col-md-4" style="display:inline-flex;"><span style="line-height:2.5;">درحال انجام</span><input style="width:25px;margin-right:15px;" type="radio" class="form-control " name="status" @if($one->status == 1)  checked @endif value="1" /></div>
                   
                   <div class="col-md-4" style="display:inline-flex;"><span style="line-height:2.5;">پایان یافته</span><input style="width:25px;margin-right:15px;" type="radio" class="form-control " name="status" @if($one->status == 0) checked @endif value="0" /></div>

                </div>
               
            </div> 
            <div class="form-group" >
                <button type="submit" class="btn btn-default waves-effect" style="width: 90px;right:65%;text-align: center;"><b> ویرایش</b></button>
            </div>

    	</form>
    </div>
    
@endsection
