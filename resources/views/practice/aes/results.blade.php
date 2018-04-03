@extends('app.layout')

@section('child')
    <div class="page">
        <h1>{{$topic->title}}</h1>
        @if($t=\App\Topic::THEORY_TYPE) @endif
        <ul class="dots">
            <li class="done"></li>
            <li class="done"></li>
            <li class="done"></li>
            <li class="done"></li>
            <li class="done"></li>
            <li class="done"></li>
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
            Результат проходження практичного завдання
        </div>

        @if($i = 1) @endif
        @foreach($results as $step => $result)
            @if($result === 0)
                <div class="practice practice-error">
                    Крок {{$i}}: помилка
                </div>
            @elseif($result === 1)
                <div class="practice practice-success">
                    Крок {{$i}}: вірно
                </div>
            @endif

            @if($i++) @endif
        @endforeach

        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice/results">
                <div class="submit">
                    <input class="btn btn-primary"  onclick="return confirm('Do you really want to reset?')" type="submit" name="reset" value="Start again">
                    {{--<a href="#" class="btn btn-default">Skip</a>--}}
                </div>

                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endsection
