@extends('app.layout')

@section('child')
    <div class="page">
        <h1>{{$topic->title}}</h1>
        @if($t=\App\Topic::THEORY_TYPE) @endif
        <ul class="dots">
            <li class="done"></li>
            <li class="in-progress"></li>
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
            Визначіть вказані підблоки вхідної послідовності
        </div>
        <p>
            На основі тексту визначіть запропоновані підблоки
            вхідної послідовності(в HEX-форматі),
            інші підблоки визначаться автоматично.
        </p>
        <div class="showTheory">Введені дані</div>
        <div class="theory">
            <p>
                Введене повідомлення: {{$data = $topic->getTyped('data')}}
            </p>
            <table class="table table-bordered">
                <tr>
                    @for($i = 0; $i < mb_strlen($data); $i++)
                        <td style="text-align: center"><code>{{$data[$i]}}</code></td>
                    @endfor
                </tr>
                <tr>
                    @for($i = 0; $i < mb_strlen($data); $i++)
                        <td style="text-align: center"><code>{{bin2hex($data[$i])}}</code></td>
                    @endfor
                </tr>
            </table>
            <p>
                Підказка: <code>X[15] = 000000XX</code>,
                де ХХ - кількість бітів, що займає текст(1символ = 8біт) в HEX-форматі
            </p>
        </div>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice">
                <table class="table">
                    <tr>
                        <td>X[0]: </td>
                        <td><input type="text" name="x0"/></td>
                    </tr>
                    <tr>
                        <td>X[1]: </td>
                        <td><input type="text" name="x1"/></td>
                    </tr>
                    <tr>
                        <td>X[15]: </td>
                        <td><input type="text" name="x15"/></td>
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
