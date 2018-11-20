@extends('admin.master.masterpage')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h3 class="m-t-0 header-title">مهارت ها</h3>
            <div class="row">
                
                <div class="col-sm-6">

                    @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <div class="button-list col-sm-12">
                                <button class="btn btn-danger col-sm-6">{{$error}}</button>
                            </div>
                        @endforeach
                    @endif
                    
                    <form class="form form-horizontal" method="post" action="{{url('expertise/update/'.$expertise->id)}}">
                        @csrf
                        <div class="form-group">
                          <label for="title">عنوان</label>
                          <input type="text" value="{{$expertise->title}}" name="title" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection