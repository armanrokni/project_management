@extends('admin.master.masterpage')

@section('content')
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">

                              <div class="card-box">

                                <div class="row">
                                  <div class="col-md-6">
                                    <form class="form-horizontal" role="form" action="{{url('profile/update')}}" method="post" enctype="multipart/form-data">
                                      {{csrf_field()}}
                                      <h1 class="m-t-0 header-title">پروفایل {{$profile->fullname}}</h1>
                                                <div class="form-group">
                                                    <div class="col-md-10">
                                                      <label for="fullname">نام و نام خانوادگی</label>
                                                        <input type="text" name="fullname" class="form-control" value="{{$profile->fullname}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-10">
                                                      <label for="phone">تلفن همراه</label>
                                                        <input type="text" name="phone" class="form-control" value="{{$profile->phone}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-10">
                                                      <label for="email">پست الکترونیک</label>
                                                        <input type="email" id="example-email" name="email" class="form-control" value="{{$profile->email}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-10">
                                                      <label for="password">تغییر رمز عبور</label>
                                                        <input type="password" name="password" class="form-control" placeholder="تغییر پسورد پیش فرض">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                  <span><h5><b>تخصص ها</b></h5></span>
                                                  <br>
                                                      <p>{{$profile->Expertise->title}}</p>
                                                </div>
                                                <div class="form-group">
                                                  <span><h5><b>انتخاب تصویر پروفایل</b></h5></span>
                                                  <br>
                                                  <input type="file" class="filestyle" value="{{url('public').'/'.$profile->avatar}}" name="avatar">
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-10">
                                                      <label for="lastLogin">آخرین ورود</label>
                                                        <input type="text" readonly="" class="form-control" name="lastLogin" value="{{$profile->lastLogin}}">
                                                    </div>
                                                </div>
                                                  <button type="submit" class="btn btn-default btn-rounded waves-effect waves-light">ثبت</button>
                                            </form>
                                  </div>
                                </div>
                              </div>
                              <div style="width:50%" dir="ltr">
                                <img src="{{url('public').'/'.$profile->avatar}}" alt="" width="300px" height="300px">
                              </div>
                            </div>
                        </div>

@endsection
