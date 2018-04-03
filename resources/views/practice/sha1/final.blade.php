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
            <li class="done"></li>
            <li class="in-progress"></li>
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
            Знайти хеш
        </div>
        <p>
            Використовуючи поточні значення
            H<sub>0</sub>, H<sub>1</sub>, H<sub>2</sub>, H<sub>3</sub>, H<sub>4</sub>
            знайти хеш-рядок (digest)
        </p>
        <div class="showTheory">Введені дані</div>
        <p>
            Хеш-рядок записується у форматі big-endian.
        </p>
        <div class="theory">
            <p>
                Введене повідомлення: {{$data = $topic->getTyped('data')}}<br/>
                Кінцеве H<sub>0</sub>: {{$h0}}<br/>
                Кінцеве H<sub>1</sub>: {{$h1}}<br/>
                Кінцеве H<sub>2</sub>: {{$h2}}<br/>
                Кінцеве H<sub>3</sub>: {{$h3}}<br/>
                Кінцеве H<sub>4</sub>: {{$h4}}<br/>
            </p>
        </div>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice">
                <table class="table">
                    <tr>
                        <td>Hash: </td>
                        <td><input type="text" name="hash"/></td>
                        @if(Auth::user()->isAdmin())<td>{{sha1($data)}}</td>@endif
                    </tr>
                </table>

                <div class="submit">
                    <input class="btn btn-primary" type="submit" value="Next">
                    <input class="btn btn-default" type="submit" onclick="return confirm('Do you really want to go back?')"  name="back" value="Back">
                    {{--<a href="#" class="btn btn-default">Skip</a>--}}
                </div>

                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endsection
