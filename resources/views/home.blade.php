@extends('layouts.admin')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>
                <div class="panel-body">
                    <ul class="nav navbar-nav">
                        <li><a href="{{url('/dashboard/topics')}}">Topics</a></li>
                        {{--<li><a href="#">Menu Item 2</a></li>--}}
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li><a href="#">Action</a></li>--}}
                                {{--<li><a href="#">Another action</a></li>--}}
                                {{--<li><a href="#">Something else here</a></li>--}}
                                {{--<li class="divider"></li>--}}
                                {{--<li class="dropdown-header">Nav header</li>--}}
                                {{--<li><a href="#">Separated link</a></li>--}}
                                {{--<li><a href="#">One more separated link</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a href="#">Menu Item 4</a></li>--}}
                        {{--<li><a href="#">Reviews <span class="badge">1,118</span></a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
