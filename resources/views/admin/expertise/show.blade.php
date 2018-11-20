@extends('admin.master.masterpage')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h3 class="m-t-0 header-title">مهارت ها</h3>
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
                                <th class="col-sm-8">عنوان</th>
                                <th class="col-sm-3"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($expertises->count() > 0)
                                    <?php $counter = 1; ?>
                                    @foreach($expertises->all() as $expertise)
                                        <tr>
                                            <td scope="row">{{$counter}}</td>
                                            <td>{{$expertise->title}}</td>
                                            <td>
                                                <a href="{{url('expertise/edit/'.$expertise->id)}}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{url('expertise/delete/'.$expertise->id)}}" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $counter++; ?>
                                    @endforeach
                                @endif
                            </tbody>
                    </table>
                <div class="col-sm-12">{{$expertises->links()}}</div>

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
                    <form class="form form-horizontal" method="post" action="{{url('expertise')}}">
                        @csrf
                        <div class="form-group">
                          <label for="title">عنوان</label>
                          <input type="text" value="{{old('title')}}" name="title" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection