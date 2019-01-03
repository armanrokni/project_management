@extends('admin.master.masterpage')

@section('content')

<div class="row">
  <div class="col-sm-12">
    <div class="card-box">
      <h1 class="m-t-0 header-title">ویرایش کاربران</h1>
      <div class="row">
        <div class="col-md-6">
          <form class="form-horizontal" role="form" action="{{url('admin/users/update').'/'.$user->id}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
                      <div class="form-group">
                          <div class="col-md-10">
                              <input type="text" name="fullname" class="form-control" value="{{$user->fullname}}">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-10">
                              <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-10">
                              <input type="email" id="example-email" name="email" class="form-control" value="{{$user->email}}">
                          </div>
                      </div>
                      <div class="form-group">
                        <span><h5><b>تخصص ها</b></h5></span>
                        <br>
                          <div class="col-sm-10">
                              <select class="form-control" name="expertise_id">
                                @foreach ($expertises as $key => $expertise)
                                  <option {{$expertise->id}} @if($user->expertise_id == $expertise->id) selected = "selected" @endif >{{$expertise->title}}</option>
                                @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <span><h5><b>انتخاب تصویر پروفایل</b></h5></span>
                        <br>
                        <input type="file" class="filestyle" data-placeholder="انتخاب تصویر پروفایل" name="avatar" value="{{$user->avatar}}">
                      </div>
                      <div class="form-group">
                          <div class="col-md-10">
                              <input type="text" class="form-control" name="lastLogin" value="{{$user->lastLogin}}">
                          </div>
                      </div>
                        <div class="form-group">
                            <div class="checkbox checkbox-custom" class="checkbox checkbox-primary">
                              <span><h5><b>دسترسی خاص</b></h5></span>
                              <br>
                                <input id="checkbox11" type="checkbox" name="access[]" value="u"
                                @if(in_array('u' , $access)) checked = "checked" @endif>
                                <label for="checkbox11">مدیریت کاربران</label>
                                <input id="checkbox11" type="checkbox" name="access[]" value="p"
                                @if(in_array('p' , $access)) checked = "checked" @endif>
                                <label for="checkbox11">مدیریت پروژه</label>
                                <input id="checkbox11" type="checkbox" name="access[]" value="r"
                                @if(in_array('r' , $access)) checked = "checked" @endif>
                                <label for="checkbox11">مدیریت گزارشات</label>
                                <input id="checkbox11" type="checkbox" name="access[]" value="c"
                                @if(in_array('c' , $access)) checked = "checked" @endif>
                                <label for="checkbox11">مدیریت گفتگوها</label>
                                <input id="checkbox11" type="checkbox" name="access[]" value="ut"
                                @if(in_array('ut' , $access)) checked = "checked" @endif>
                                <label for="checkbox11">امکانات</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default btn-rounded waves-effect waves-light">ویرایش</button>
                        <button type="submit" name="button"><a href="{{url('admin/users')}}"></a>لغو</button>
                  </form>
        </div>
                  <div style="width:50%" dir="ltr">
                    <img src="{{url('public').'/'.$user->avatar}}" alt="" width="300px" height="300px">
                  </div>
      </div>
    </div>
  </div>
</div>


@endsection
