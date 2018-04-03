@extends('layouts.admin')


@section('content')
    @if($topic->id)
        @if($action = 'dashboard/topics/' . $topic->id . '/edit')@endif
    @else
        @if($action = 'dashboard/topic/new')@endif
    @endif
    <form class="container spark-screen" method="post" action="{{url($action)}}"
          method="post">
        <div class="row" style="margin-bottom: 1em">
            <div class="col-md-12">
                <h1>Topic editing</h1>
            </div>
        </div>
        <div class="row" style="margin-bottom: 2em">
            <div class="col-md-12">
                <input type="submit" class="btn btn-primary" value="Save"/>
                <a href="{{url('dashboard/topics')}}" class="btn">Back to list</a>
            </div>
        </div>
        <div class="row" style="margin-bottom: .75em">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Topic title</span>
                    <input type="text" name="title" value="{{$topic->title}}" class="form-control" placeholder="Title" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 2em">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Topic slug</span>
                    <input type="text" name="slug" value="{{$topic->slug}}" class="form-control" placeholder="Slug" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Questions</div>
                    <div class="panel-body">
                        @include('dashboard.topic.partials.react-questions')
                    </div>
                </div>
            </div>
        </div>
        {!! csrf_field() !!}
    </form>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.5/marked.js"></script>
@endsection