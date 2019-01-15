@extends('admin.master.masterpage')
@section('content')

    <!-- <div class="card-box">
    	<div class="panel-heading" >
    		<h4 class="m-t-0 header-title">مدیریت پروژه ها</h4>

    	</div>
    </div> -->

    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#project" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-home"></i></span>
                        <span class="hidden-xs">پروژه ها</span>
                    </a>
                </li>


                <li >
                    <a href="#addProject" data-toggle="tab" aria-expanded="true">
                        <span class="visible-xs"><i class="fa fa-user"></i></span>
                        <span <?php if(\Auth::user()->Role == 'user'){ echo "style='display: none'"; } ?> class="hidden-xs">ثبت پروژه جدید</span>
                    </a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="project">
                    <div class="p-20">
                        <table class="table table-bordered m-0">

                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان پروژه</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ پایان</th>
                                    <th>نام مشتری</th>
                                    <th>هزینه پروژه</th>
                                    <th>وضعیت</th>
                                    <th>تغییرات</th>
                                    <th>اطلاعات تکمیلی</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if($project->first()){if(isset($_GET['page'])){ $counter = $_GET['page'] * 20 - 19;}else{ $counter = 1;}}?>
                                @foreach($project as $pro)
                                    <tr>
                                        <td>{{$counter++}}</td>
                                        <td>{{$pro->title}}</td>
                                        <td>{{$pro->startTime}}</td>
                                        <td>{{$pro->endTime}}</td>
                                        <td>{{$pro->customer}}</td>
                                        <td>{{$pro->price}}</td>
                                        <td>
                                            @if($pro->status == 1){{'در حال انجام'}} @elseif($pro->status == 0) {{'پایان یافته'}} @endif
                                        </td>
                                        <td>
                                            <a href="{{url('project/delete').'/'.$pro->id}}">حذف</a>&nbsp&nbsp
                                            <a href="{{url('project/edit').'/'.$pro->id}}">ویرایش</a>
                                        </td>
                                        <td>
                                            <a href="{{url('project/info').'/'.$pro->id}}">ادامه</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="display:flex; justify-content: center; align-items: center; margin-bottom:10px"> {{ $project->links() }} </div>

                    </div>
                </div>
                <div class="tab-pane " id="addProject">
                    <div class="card-box" style="border:none;"></div>
                    <form class="form-horizontal" method="post" action="{{url('project/insert')}}" >
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="col-md-1 control-label">عنوان پروژه</label>
                            <div class="col-md-6">
                                <input name="title" type="text" class="form-control " placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">تاریخ شروع</label>
                            <div class="col-md-6">
                                <input name="startTime" type="text" class="form-control " value="" placeholder="روز/ماه/سال">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">تاریخ پایان</label>
                            <div class="col-md-6">
                                <input name="endTime" type="text" class="form-control " placeholder="روز/ماه/سال">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">نام مشتری</label>
                            <div class="col-md-6">
                                <input name="customer" type="text" class="form-control " placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">هزینه پروژه</label>
                            <div class="col-md-6">
                                <input name="price" type="text" class="form-control " placeholder="">
                            </div>
                        </div>

                        <div class="form-group" >
                            <button type="submit" class="btn btn-default waves-effect" style="width: 90px;right:65%;text-align: center;"><b> ثبت</b></button>
                        </div>

                    </form>
                </div>

                </div>
            </div>
        </div>

        <section>


        </section>

    </div>
@endsection
