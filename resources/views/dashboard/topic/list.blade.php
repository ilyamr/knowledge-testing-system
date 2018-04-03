@extends('dashboard.layout')

@section('child')
    <div class="table-action">
        <a href="{{route('new-topic')}}" class="btn btn-primary">New Topic</a>
    </div>

    {!!$table->show()!!}
@endsection
