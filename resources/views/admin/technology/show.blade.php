@extends('admin.master.masterpage')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h3 class="m-t-0 header-title">تکنولوژی ها</h3>
            <div class="row">
                <div class="col-sm-6">
                    @if(Session::get('message'))
                            <div class="button-list col-sm-12">
                                <button class="btn btn-danger col-sm-6">{{session('message')}}</button>
                            </div>
                    @endif
                    @if(Session::get('successMessage'))
                            <div class="button-list col-sm-12">
                                <button class="btn btn-success col-sm-6">{{session('successMessage')}}</button>
                            </div>
                    @endif
                    <table class="table table-striped">
                        <thead class="thead-default">
                            <tr>
                                <th class="col-sm-1">#</th>
                                <th class="col-sm-2">تصویر</th>
                                <th class="col-sm-6">عنوان</th>
                                <th class="col-sm-3"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($technologies->count() > 0)
                                    <?php $counter = 1; ?>
                                    @foreach($technologies->all() as $tech)
                                        <tr>
                                            <td scope="row">{{$counter}}</td>
                                            <td>
                                                <img src="{{asset('storage/app/public/'.$tech->icon)}}" />
                                            </td>
                                            <td>{{$tech->title}}</td>
                                            <td>
                                                <a href="{{url('technology/edit/'.$tech->id)}}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{url('technology/delete/'.$tech->id)}}" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $counter++; ?>
                                    @endforeach
                                @endif
                            </tbody>
                    </table>
                <div class="col-sm-12">{{$technologies->links()}}</div>

                </div>
                <div class="col-sm-6">

                    @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <div class="button-list col-sm-12">
                                <button class="btn btn-danger col-sm-6">{{$error}}</button>
                            </div>
                        @endforeach
                    @endif
                    @if(!empty(session('success')))
                        <div class="button-list col-sm-12">
                            <button class="btn btn-success col-sm-6">{{session('success')}}</button>
                        </div>
                    @endif
                    <form enctype="multipart/form-data" class="form form-horizontal" method="post" action="{{url('technology')}}">
                        @csrf
                        <div class="form-group">
                          <label for="title">عنوان</label>
                          <input type="text" value="{{old('title')}}" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="file">تصویر</label>
                          <input type="file" value="{{old('file')}}" name="icon" style="padding:0px;" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection