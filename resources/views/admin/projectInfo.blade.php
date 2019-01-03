@extends('admin.master.masterpage')
@section('content')
<div class="row"> 
    <div class="col-lg-12">
        <div class="panel-heading" >
            <h4 class="m-t-0 header-title"> اطلاعات تکمیلی پروژه {{$project->title}}</h4>
        </div> 
        <ul class="nav nav-tabs">                           
            <li class="@if((Session::has('section') && Session::get('section') == 'user') || !Session::has('section'))
                    active
                @endif"> 
                <a href="#user" data-toggle="tab" aria-expanded="false"> 
                    <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                    <span class="hidden-xs">افزودن کاربر</span> 
                </a> 
            </li> 
            <li class="@if(Session::has('section') && Session::get('section') == 'file' )
                        active
                 @endif"> 
                <a href="#file" data-toggle="tab" aria-expanded="false"> 
                    <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                    <span class="hidden-xs">افزودن فایل</span> 
                </a> 
            </li> 
            <li class="@if(Session::has('section') && Session::get('section') == 'reports' )
                        active
                 @endif"> 
                <a href="#reports" data-toggle="tab" aria-expanded="false"> 
                    <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                    <span class="hidden-xs">گزارشات</span> 
                </a> 
            </li> 
            <li class="@if(Session::has('section') && Session::get('section') == 'timeLine') 
                    active
                @endif"> 
                <a href="#timeLine" data-toggle="tab" aria-expanded="false"> 
                    <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                    <span class="hidden-xs"> زمانبندی پروژه</span> 
                </a> 
            </li> 
        </ul>

        <div class="tab-content">                  
            <div class="tab-pane @if((Session::has('section') && Session::get('section') == 'user') || !Session::has('section'))
                    active
                @endif" id="user"> 
                <div class="card-box" style="border:none;">
                    <form class="form-horizontal" method="post" action="{{url('project/user')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="projectId" value="{{$project->id}}" >

                        <div class="form-group">
                            <label class="col-md-1 control-label">افزودن کاربر</label>
                            <div class="col-md-6">
                                <select name="userId" class="form-control ins">
                                    <option value="0"></option>
                                        @foreach($user as $u)
                                            <option value="{{$u->id}}">{{$u->fullname}}</option>
                                        @endforeach  
                                </select>
                            </div>
                        </div>         
                        
                        <div class="form-group" >
                            <button type="submit" class="btn btn-default waves-effect" style="width: 90px;right:65%;text-align: center;"><b> ثبت</b></button>
                        </div>
                    </form>
                </div>
                <div class="card-box" style="border:none;">
                    <div class="p-20">
                        <table class="table table-bordered m-0">                                
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام کاربران</th>
                                    <th>تغییرات</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if($project->first()){if(isset($_GET['page'])){ $counter = $_GET['page'] * 20 - 19;}else{ $counter = 1;}}?>
                                @foreach($project->pm as $value)
                                    <tr>
                                        <td>{{$counter++}}</td>
                                        <td>{{$value->userInfo->fullname}} </td>
                                        <td>
                                            <a href="{{url('project/user/delete').'/'.$project->id.'/'.$value->userInfo->id}}">حذف</a>&nbsp&nbsp
                                        </td>                 
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>    
            </div> 


            <div class="tab-pane @if(Session::has('section') && Session::get('section') == 'file' )
                        active
                @endif" id="file">
                <div class="card-box" style="border:none;">        
                    <form class="form-horizontal" method="post" action="{{url('project/file')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="project_id" value="{{$project->id}}" >
                        <div class="form-group">
                            <label class="col-md-1 control-label">افزودن فایل</label>
                            <div class="col-md-6">
                                <input name="filename" type="file"   class=" form-control">
                                    @if ($errors->has('filename'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('filename') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>     
                        <div class="form-group" >
                            <button type="submit" class="btn btn-default waves-effect" style="width: 90px;right:65%;text-align: center;"><b> ثبت</b></button>
                        </div>
                    </form>
                </div>
                <div class="card-box" style="border:none;"> 
                    <div class="panel-heading" >
                        <h4 class="m-t-0 header-title">گزارشات</h4>
                    </div>                               
                    <div class="p-20">
                        <table class="table table-bordered m-0">
                            
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام فایل</th>
                                    <th>حذف </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if($file->first()){if(isset($_GET['page'])){ $counter = $_GET['page'] * 20 - 19;}else{ $counter = 1;}}?>
                                @foreach($file as $f)
                                    <tr>
                                        <td>{{$counter++}}</td>
                                        <td>{{$f->fileName}}</td>  
                                        <td>
                                            <a href="{{url('project/file/delete').'/'.$f->id}}">حذف</a>
                                            &nbsp&nbsp
                                       </td>                   
                                    </tr>
                                @endforeach        
                            </tbody>
                        </table>
                    </div>   
                </div>
            </div> 
            <div class="tab-pane @if(Session::has('section') && Session::get('section') == 'reports' )
                        active
                 @endif" id="reports"> 
                <div class="card-box" style="border:none;">
                    <div class="panel-heading" >
                        <h4 class="m-t-0 header-title">ایجاد گزارش جدید</h4>
                    </div>                          
                    <form class="form-horizontal" method="post" action="{{url('project/reports')}}" > 
                        {{csrf_field()}}
                        <input type="hidden" name="project_id" value="{{$project->id}}" >
                        <input type="hidden" name="user_id" value="4" >
                        <div class="form-group">
                            <label class="col-md-1 control-label">توضیحات</label>
                            <div class="col-md-6">
                                <textarea name="description" type="text" class="form-control ins" ></textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div> 
                        <div class="form-group" > 
                            <button type="submit" class="btn btn-default waves-effect" style="width: 90px;right:65%;text-align: center;"><b> ثبت</b></button>
                        </div>
                    </form>
                </div> 
                <div class="card-box" style="border:none;"> 
                    <div class="panel-heading" >
                        <h4 class="m-t-0 header-title">گزارشات</h4>
                    </div>                               
                    <div class="p-20">
                        <table class="table table-bordered m-0">
                            
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام کاربر</th>
                                    <th>تاریخ گزارش</th>
                                    <th>توضیحات</th>
                                    <th>تغییرات</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php use App\lib\Jdf;
                                $jdf = new Jdf;
                                if($report->first()){
                                    if(isset($_GET['page'])){
                                        $counter = $_GET['page'] * 20 - 19;
                                    }else{ $counter = 1;}
                                }
                                ?>
                                @foreach($report as $rep)
                                    <tr>
                                        <td>{{$counter++}}</td>
                                        <td>{{$rep->userInfo->fullname}}</td>  
                                        <td>{{$jdf->jdate('H:i , Y-n-j',$rep->createdAt)}}</td>
                                        <td>{{$rep->description}}</td>
                                        <td>
                                            <a href="{{url('project/reports/delete').'/'.$rep->id}}">حذف</a>&nbsp&nbsp
                                       </td>                   
                                    </tr>
                                @endforeach        
                            </tbody>
                        </table>
                    </div>   
                </div>
            </div> 
            <div class="tab-pane @if(Session::has('section') && Session::get('section') == 'timeLine') 
                    active
                @endif" id="timeLine"> 
                <div class="card-box" style="border:none;">
                    <div class="panel-heading" >
                        <h4 class="m-t-0 header-title">ایجاد وظیفه جدید</h4>
                    </div>                         
                    <form class="form-horizontal" method="post" action="{{url('project/timeLine')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="project_id" value="{{$project->id}}" >
                        <input type="hidden" name="user_id" value="3" >
                        <div class="form-group">
                            <label class="col-md-1 control-label">عنوان</label>
                            <div class="col-md-6">
                                <input type="text" name="title" class=" form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">تاریخ شروع</label>
                            <div class="col-md-6">
                                <input type="text" name="startTime" class=" form-control" placeholder="روز/ماه/سال">
                            </div>
                        </div>         
                        <div class="form-group">
                            <label class="col-md-1 control-label">تاریخ پایان</label>
                            <div class="col-md-6">
                                <input type="text" name="endTime" class=" form-control" placeholder="روز/ماه/سال">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">درصد</label>
                            <div class="col-md-6">
                                <input type="text" name="percent" class=" form-control">
                            </div>
                        </div>
                        <div class="form-group" >
                            <button type="submit" class="btn btn-default waves-effect" style="width: 90px;right:65%;text-align: center;"><b> ثبت</b></button>
                        </div>
                    </form>   
                    <form class="form-horizontal" method="post" action="{{url('project/timeLine/users')}}">


                    </form>        
                </div>

                <div class="card-box" style="border:none;"> 
                    <div class="panel-heading" >
                        <h4 class="m-t-0 header-title">زمانبندی وظایف</h4>
                    </div>                               
                    <div class="p-20">
                        <table class="table table-bordered m-0">
                            
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام کاربر</th>
                                    <th>عنوان</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ پایان</th>
                                    <th>درصد</th>
                                    <th>وضعیت</th>
                                    <th>تغییرات</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if($timeLine->first()){
                                    if(isset($_GET['page'])){
                                        $counter = $_GET['page'] * 20 - 19;
                                    }else{ $counter = 1;}
                                }
                                ?>
                                @foreach($timeLine as $tl)
                                    <tr>
                                        <td>{{$counter++}}</td>
                                        <td>{{$tl->userInfo->fullname}}</td>
                                        <td>{{$tl->title}}</td>  
                                        <td>{{$tl->startTime}}</td>
                                        <td>{{$tl->endTime}}</td>
                                        <td>{{$tl->percent}}</td>  
                                        <td>
                                            @if($tl->status == 1)
                                                @if($tl->startTime > $jdf->tr_num($jdf->jdate('Y-m-d')))
                                                    شروع نشده
                                                @elseif($tl->startTime < $jdf->tr_num($jdf->jdate('Y-m-d')) && $tl->endTime > $jdf->tr_num($jdf->jdate('Y-m-d')))
                                                    در حال انجام
                                                @elseif($tl->endtime < $jdf->tr_num($jdf->jdate('Y-m-d')))
                                                    عقب افتده
                                                @endif
                                            @elseif($tl->status == 2)
                                                پایان یافته
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('project/timeLine/delete').'/'.$tl->id}}">حذف</a>&nbsp&nbsp
                                            <a href="{{url('project/timeLine/finished').'/'.$tl->id}}">پایان یافته</a>
                                       </td>                   
                                    </tr>
                                @endforeach    
                            </tbody>
                        </table>
                    </div>   
                </div>
            </div> 
        </div> 
    </div>
</div>

@endsection
