@extends('admin.master.masterpage')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h3 class="m-t-0 header-title">تکنولوژی ها</h3>
            <div class="row">
                <div class="col-sm-6">

                    @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <div class="button-list col-sm-12">
                                <button class="btn btn-danger col-sm-6">{{$error}}</button>
                            </div>
                        @endforeach
                    @endif
                    <form enctype="multipart/form-data" class="form form-horizontal" method="post" action="{{url('technology/update/'.$technology->id)}}">
                        @csrf
                        <div class="form-group">
                          <label for="title">عنوان</label>
                          <input type="text" value="{{$technology->title}}" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="file">تصویر</label>
                          <input type="file" value="" name="icon" style="padding:0px;" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection