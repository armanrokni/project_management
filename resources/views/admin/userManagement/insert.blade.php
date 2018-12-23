@extends('admin.master.masterpage')

@section('content')

<div class="row">
  <div class="col-sm-12">
    <div class="card-box">
      <h1 class="m-t-0 header-title">ثبت کاربران</h1>
      <div class="row">
        <div class="col-md-6">
          <form class="form-horizontal" role="form" action="{{url('admin/users/insert')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
                      <div class="form-group">
                          <div class="col-md-10">
                              <input type="text" name="fullname" class="form-control" placeholder="نام و نام خانوادگی">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-10">
                              <input type="text" name="phone" class="form-control" placeholder="شماره همراه">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-10">
                              <input type="email" id="example-email" name="email" class="form-control" placeholder="پست الکترونیک">
                          </div>
                      </div>
                      <div class="form-group">
                        <span><h5><b>تخصص ها</b></h5></span>
                        <br>
                          <div class="col-sm-10">
                              <select class="form-control" name="expertise_id">
                                @foreach ($expertises as $key => $expertise)
                                  <option value="{{$expertise->id}}" > {{$expertise->title}} </option>
                                @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <span><h5><b>انتخاب تصویر پروفایل</b></h5></span>
                        <br>
                        <input type="file" class="filestyle" data-placeholder="انتخاب تصویر پروفایل" name="avatar">
                      </div>
                      <div class="form-group">
                          <div class="col-md-10">
                              <input type="text" class="form-control" name="lastLogin" placeholder="آخرین ورود">
                          </div>
                      </div>
                        <div class="form-group">
                            <div class="checkbox checkbox-custom" class="checkbox checkbox-primary">
                              <span><h5><b>دسترسی خاص</b></h5></span>
                              <br>
                                <input id="checkbox11" type="checkbox" name="access[]" value="u">
                                <label for="checkbox11">مدیریت کاربران</label>
                                <input id="checkbox11" type="checkbox" name="access[]" value="p">
                                <label for="checkbox11">مدیریت پروژه</label>
                                <input id="checkbox11" type="checkbox" name="access[]" value="r">
                                <label for="checkbox11">مدیریت گزارشات</label>
                                <input id="checkbox11" type="checkbox" name="access[]" value="c">
                                <label for="checkbox11">مدیریت گفتگوها</label>
                                <input id="checkbox11" type="checkbox" name="access[]" value="ut">
                                <label for="checkbox11">امکانات</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default btn-rounded waves-effect waves-light">ثبت</button>
                  </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
