@extends('admin.master.masterpage')

@section('content')

<div class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="m-b-30">
                    <a href="{{url('admin/users/insert')}}"><button class="btn btn-default waves-effect waves-light">افزودن کاربر <i class="fa fa-plus"></i></button></a>
                </div>
            </div>
        </div>
        <h1 class="m-t-0 header-title">همه کاربران</h1>
        <div class="">
          <table class="table table-striped" id="datatable-editable">
              <thead>
                  <tr>
                      <th>ردیف</th>
                      <th>تصویر پروفایل</th>
                      <th>نام و نام خانوادگی</th>
                      <th>شماره همراه</th>
                      <th>پست الکترونیک</th>
                      <th>تخصص ها</th>
                      <th>دسترسی خاص</th>
                      <th>آخرین ورود</th>
                      <th>ویرایش</th>
                  </tr>
              </thead>
              <tbody>
                <?php

                use \App\lib\Jdf;
                $jdf = new Jdf;

                 ?>

                @if($users->first())
                @foreach ($users as $key => $user)
                  <tr class="gradeX">
                      <td>{{ $key+1 }}</td>
                      <td> <img src="{{url('public').'/'.$user->avatar}}" alt="" width="50px" height="50px"> </td>
                      <td>{{$user->fullname}}</td>
                      <td>{{$user->phone}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->Expertise->title}}</td>
                      <td>{{$user->access}}</td>
                      @if($user->lastLogin > 1) <td>{{$jdf->jdate('H:i, Y-n-j', $user->lastLogin)}}</td> @else <td></td> @endif
                      <td class="actions">
                          <a href="{{url('admin/users/edit').'/'.$user->id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                          <a href="{{url('admin/users/delete').'/'.$user->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                      <td colspan="9" style="text-align:center">کاربری موجود نیست </td>
                  </tr>
                  @endif
              </tbody>
          </table>
        </div>
    </div>
    <!-- end: page -->

</div> <!-- end Panel -->
@endsection
