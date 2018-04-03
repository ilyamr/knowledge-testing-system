@extends('layouts.admin')

@section('content')
    <form class="container spark-screen" action="{{url('dashboard/topics/' . $topic->id . '/description')}}" method="post">
        <div class="row" style="margin-bottom: 1em">
            <div class="col-md-12">
                <h1>{{$topic->title}}</h1>
            </div>
        </div>
        <div class="row" style="margin-bottom: 2em">
            <div class="col-md-12">
                <input type="submit" class="btn btn-primary" value="Save"/>
                <a href="{{url('dashboard/topics')}}" class="btn">Back to list</a>
            </div>
        </div>
        <div class="row" id="editor">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit</div>
                    <div class="panel-body height-full" style="height: 100%">
                        <textarea v-model="input" name="description" debounce="50">{{$topic->description}}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Preview</div>

                    <div class="panel-body height-full height-full-text">
                        <div v-html="input | marked"></div>
                    </div>
                </div>
            </div>
        </div>
        {!! csrf_field() !!}
    </form>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.5/marked.js"></script>
    <script src="{{url('js/description.js')}}"></script>
@endsection