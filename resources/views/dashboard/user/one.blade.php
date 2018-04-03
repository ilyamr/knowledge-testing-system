@extends('layouts.admin')

@section('content')
    <form class="container spark-screen" method="post" action="{{url('dashboard/users/' . $user->id . '/edit')}}"
          method="post">
        <div class="row" style="margin-bottom: 1em">
            <div class="col-md-12">
                <h1>User</h1>
            </div>
        </div>
        <div class="row" style="margin-bottom: 2em">
            <div class="col-md-12">
                <input type="submit" class="btn btn-primary" value="Save"/>
                <a href="{{url('dashboard/users')}}" class="btn">Back to list</a>
            </div>
        </div>
        <div class="row data-field">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Name</span>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Name" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="row data-field">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Email</span>
                    <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="row data-field">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Role</span>
                    <input type="text" name="role" value="{{$user->role}}" class="form-control" placeholder="Role" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="row data-field">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Intellectual mode</span>
                    <div>
                    <input type="checkbox" {{$user->intellectual?'checked':''}} value="1" name="intellectual" data-toggle="toggle">

                    </div>
                </div>
            </div>
        </div>
        {!! csrf_field() !!}
    </form>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.5/marked.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection