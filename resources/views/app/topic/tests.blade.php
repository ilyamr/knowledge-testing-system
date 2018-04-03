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
        @if($t=\App\Topic::THEORY_TYPE) @endif
        @if($iter=$topic->getIter($t)) @endif
        <ul class="dots">
            @for($i = 0; $i < count($topic->getDestiny($t)); $i++)
            <li class="{{($i < $iter)?'done':(($i == $iter)?'in-progress':'')}}"></li>
            @endfor
        </ul>
        <div class="question">
            @if($question->image)
                <img class="img-rounded" src="{{$question->image}}" alt="">
            @endif
            <p>
                {{$question->question}}
            </p>
        </div>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/tests">
                @include("app.topic.types.{$question->type}")

                <div class="submit">
                    <input class="btn btn-primary" type="submit" value="Next">
                    <input class="btn btn-default" type="submit" value="Skip" name="skip" onclick="return confirm('Do you really want to skip this question?')" >
                </div>

                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endsection
