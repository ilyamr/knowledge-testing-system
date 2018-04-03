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
            Знайти вихідні значення A, B, C, D
        </div>
        <p>
            Використовуючи поточні та початкові значення A, B, C, D знайти вихідні значення A, B, C, D
        </p>
        <div class="showTheory">Введені дані</div>
        <div class="theory">
            <p>
                Введене повідомлення: {{$data = $topic->getTyped('data')}}<br/>
                Поточне A: {{$a0}}<br/>
                Поточне B: {{$b0}}<br/>
                Поточне C: {{$c0}}<br/>
                Поточне D: {{$d0}}<br/>
            </p>
        </div>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice">
                <table class="table">
                    <tr>
                        <td>A: </td>
                        <td><input type="text" name="a0"/></td>
                    </tr>
                    <tr>
                        <td>B: </td>
                        <td><input type="text" name="b0"/></td>
                    </tr>
                    <tr>
                        <td>C: </td>
                        <td><input type="text" name="c0"/></td>
                    </tr>
                    <tr>
                        <td>D: </td>
                        <td><input type="text" name="d0"/></td>
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
