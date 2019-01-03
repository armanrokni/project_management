@extends('admin.master.masterpage')
@section('content')

    <div class="card-box">
    	<div class="panel-heading" >
    		<h4 class="m-t-0 header-title">مدیریت گزارشات</h4>

    	</div>
    </div>

    <div class="card-box">
    	<div class="panel-heading" >
    		<h4 class="m-t-0 header-title">ثبت گزارش جدید</h4>
    		<p class="text-muted m-b-30 font-18"></p>	
    	</div>	
    	<form class="form-horizontal" method="post" action="{{url('project/insert')}}" > 
            {{csrf_field()}}

            <div class="form-group">
                <label class="col-md-1 control-label">نام کاربر</label>
                <div class="col-md-6">
                    <input name="" type="text" class="form-control " placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-1 control-label">نام پروژه</label>
                <div class="col-md-6">
                    <input name="startTime" type="text" class="form-control " value="">
                </div>
            </div>
                                     
            <div class="form-group">
                <label class="col-md-1 control-label">تاریخ ایجاد</label>
                <div class="col-md-6">
                    <input name="endTime" type="text" class="form-control " placeholder="">
                </div>
            </div> 
    		
    		<div class="form-group">
                <label class="col-md-1 control-label">توضیحات</label>
                <div class="col-md-6">
                    <input name="customer" type="text" class="form-control " placeholder="">
                </div>
            </div> 
    		

            <div class="form-group" >
                <button type="submit" class="btn btn-default waves-effect" style="width: 90px;right:65%;text-align: center;"><b> ثبت</b></button>
            </div>

    	</form>
    </div>
    <div class="card-box">
    	<div class="panel-heading" >
    		<h4 class="m-t-0 header-title">گزارشات ثبت شده</h4>
    		<p class="text-muted m-b-30 font-18"></p>

    	</div>
      
    	<div class="p-20">
            <table class="table table-bordered m-0">
                
                <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان پروژه</th>
                        <th>تاریخ شروع</th>
                        <th>تاریخ پایان</th>
                        <th>نام مشتری</th>
                        <th>هزینه پروژه</th>
                        <th>تغییرات</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($project as $pro)
                        <tr>
                           <td>{{$pro->title}}</td>
                           <td>{{$pro->startTime}}</td>
                           <td>{{$pro->endTime}}</td>
                           <td>{{$pro->customer}}</td>
                           <td>{{$pro->price}}</td>
                           <td>
                                <a href="{{url('project/delete').'/'.$pro->id}}">حذف</a>&nbsp&nbsp
                                <a href="{{url('project/edit').'/'.$pro->id}}">ویرایش</a>
                           </td>                   
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>		
@endsection
