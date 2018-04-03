@extends('app.layout')

@section('child')
    <div class="page">
        <h1>{{$topic->title}}</h1>
        @if($t=\App\Topic::THEORY_TYPE) @endif
        <ul class="dots">
            <li class="in-progress"></li>
            <li class=""></li>
            <li class=""></li>
        </ul>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="question">
            Select shift and enter your name
        </div>
        <div class="form">
            <form method="post" action="/caesar/practice">
                <label>Shift (n):
                    <select name="n">
                        @for($i = 1; $i <= 26; $i++) {
                            <option value="{{$i}}">{{$i}}</option>';
                        @endfor
                    </select>
                </label>
                <label>Your name (only a-z accepted):
                    <input type="text" name="name"/>
                </label>

                <div class="submit">
                    <input class="btn btn-primary" type="submit" value="Next">
                    {{--<a href="#" class="btn btn-default">Skip</a>--}}
                </div>

                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endsection
