@extends('app.layout')

@section('head')
    <script type="text/x-mathjax-config">
      MathJax.Hub.Config({tex2jax: {inlineMath: [
        ['$','$'],
        ['{\\displaystyle ','}\\'],
        ['\\(','\\)'
      ]]}});
    </script>
    <script type="text/javascript" async
            src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
    </script>
@endsection

@section('child')
    <div class="page">
        <h1>{{$topic->title}}</h1>
        <ul class="results">
            @foreach($corrects as $correct)
            <li class="{{$correct->correct===$correct->submitted?'right':'wrong'}}">
                {{$correct->question}}
                <div class="answer">{{$correct->answer}}</div>
            </li>
            @endforeach
        </ul>
        <div class="form">
            <form method="post" action="/{{$topic->id}}/tests/results">
                <div class="submit">
                    <input class="btn btn-primary" onclick="return confirm('Do you really want to reset?')" type="submit" name="reset" value="Start again">
                </div>
                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endsection
