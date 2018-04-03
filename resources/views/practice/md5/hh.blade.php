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
            <li class="in-progress"></li>
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
            Використовуючи значення A, B, C, D, X[{{$index}}] знайти нове A
        </div>
        <p>
            Процедура HH, етап 3, дія 32(33)
        </p>
        <div class="showTheory">Введені дані</div>
        <div class="theory">
            @include('practice.md5.hint')
        </div>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice">
                <table class="table">
                    <tr>
                        <td>F: </td>
                        <td><input type="text" name="h1"/></td>
                    </tr>
                    <tr>
                        <td>A<sub>pop</sub>: </td>
                        <td><input type="text" name="apop3"/></td>
                    </tr>
                    <tr>
                        <td>A<sub>cycl</sub>: </td>
                        <td><input type="text" name="acycl3"/></td>
                    </tr>
                    <tr>
                        <td>A<sub>out</sub>: </td>
                        <td><input type="text" name="aout3"/></td>
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
