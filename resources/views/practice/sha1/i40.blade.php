@extends('app.layout')

@section('child')
    <div class="page">
        <h1>{{$topic->title}}</h1>
        @if($t=\App\Topic::THEORY_TYPE) @endif
        <ul class="dots">
            <li class="done"></li>
            <li class="done"></li>
            <li class="done"></li>
            <li class="in-progress"></li>
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
            Використовуючи значення A, B, C, D, word знайти нове A
        </div>
        <p>
            Етап 3, дія 41(i = 40)
        </p>
        <div class="showTheory">Дані</div>
        <div class="theory">
            @include('practice.sha1.hint')
        </div>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice">
                <table class="table">
                    <tr>
                        <td>F: </td>
                        <td><input type="text" name="f3"/></td>
                        @if(Auth::user()->isAdmin())<td>{{$f}}</td>@endif
                    </tr>
                    <tr>
                        <td>A<sub>cycl</sub>: </td>
                        <td><input type="text" name="acycl3"/></td>
                        @if(Auth::user()->isAdmin())<td>{{$acycl}}</td>@endif
                    </tr>
                    <tr>
                        <td>A: </td>
                        <td><input type="text" name="a3"/></td>
                        @if(Auth::user()->isAdmin())<td>{{$a}}</td>@endif
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
