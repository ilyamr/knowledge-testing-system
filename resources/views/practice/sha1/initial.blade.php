@extends('app.layout')

@section('child')
    <div class="page">
        <h1>{{$topic->title}}</h1>
        @if($t=\App\Topic::THEORY_TYPE) @endif
        <ul class="dots">
            <li class="in-progress"></li>
            <li class=""></li>
            <li class=""></li>
            <li class=""></li>
            <li class=""></li>
            <li class=""></li>
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
            Введіть текст  для  хешування.
        </div>
        <p>
            Для перевірки знань кількість символів має бути не менше 8 і не більше 55.
        </p>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice">
                <label>Вхідні дані:
                    <input type="text" name="data"/>
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
