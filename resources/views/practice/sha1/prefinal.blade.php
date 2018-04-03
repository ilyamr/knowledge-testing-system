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
            <li class="in-progress"></li>
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
            Знайти вихідні значення A, B, C, D, E
        </div>
        <p>
            Використовуючи початкові значення констант H
            та поточні значення A, B, C, D, E знайти вихідні значення
            H<sub>0</sub>, H<sub>1</sub>, H<sub>2</sub>, H<sub>3</sub>, H<sub>4</sub>
        </p>
        <div class="showTheory">Введені дані</div>
        <div class="theory">
            <p>
                Введене повідомлення: {{$data = $topic->getTyped('data')}}<br/>
                Поточне A: {{$a}}<br/>
                Поточне B: {{$b}}<br/>
                Поточне C: {{$c}}<br/>
                Поточне D: {{$d}}<br/>
                Поточне E: {{$e}}<br/>
            </p>
        </div>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice">
                <table class="table">
                    <tr>
                        <td>H<sub>0</sub>: </td>
                        <td><input type="text" name="h0"/></td>
                        @if(Auth::user()->isAdmin())<td>{{$h0}}</td>@endif
                    </tr>
                    <tr>
                        <td>H<sub>1</sub>: </td>
                        <td><input type="text" name="h1"/></td>
                        @if(Auth::user()->isAdmin())<td>{{$h1}}</td>@endif
                    </tr>
                    <tr>
                        <td>H<sub>2</sub>: </td>
                        <td><input type="text" name="h2"/></td>
                        @if(Auth::user()->isAdmin())<td>{{$h2}}</td>@endif
                    </tr>
                    <tr>
                        <td>H<sub>3</sub>: </td>
                        <td><input type="text" name="h3"/></td>
                        @if(Auth::user()->isAdmin())<td>{{$h3}}</td>@endif
                    </tr>
                    <tr>
                        <td>H<sub>4</sub>: </td>
                        <td><input type="text" name="h4"/></td>
                        @if(Auth::user()->isAdmin())<td>{{$h4}}</td>@endif
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
