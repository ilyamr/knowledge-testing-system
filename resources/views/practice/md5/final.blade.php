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
            Використовуючи поточні значення A, B, C, D знайти хеш-рядок
        </p>
        <div class="showTheory">Введені дані</div>
        <p>
            Хеш-рядок записується у форматі little-endian.
        </p>
        <div class="theory">
            <p>
                Введене повідомлення: {{$data = $topic->getTyped('data')}}<br/>
                Кінцеве A: {{$a0c}}<br/>
                Кінцеве B: {{$b0c}}<br/>
                Кінцеве C: {{$c0c}}<br/>
                Кінцеве D: {{$d0c}}<br/>
            </p>
        </div>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice">
                <table class="table">
                    <tr>
                        <td>Hash: </td>
                        <td><input type="text" name="hash"/></td>
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
