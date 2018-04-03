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
            Визначіть результат роботи функції addRoundKey()
        </div>
        <p>
            Це перша ітерація для 128-бітного ключа. 
        </p>
        <p>
            У Вас наявна таблиця state. Визначіть результат роботи addRoundKey() на першій ітерації для однієї колонки.
        </p>
        <p>
            У процедурі AddRoundKey , кожен байт стану об'єднується з RoundKey використовуючи операцію XOR.
        </p>
        <div class="showTheory">Введені дані</div>
        <div class="theory">
            <div>
                <div>
                    <img width="100%" src="https://upload.wikimedia.org/wikipedia/commons/a/ad/AES-AddRoundKey.svg" alt="">
                </div>
            </div>
        </div>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice">

                <div class="row">
                    <div class="col-md-4">
                        <div>State</div>
                        <table class="table">
                            @foreach($state as $stateRow)
                                <tr>
                                    @foreach($stateRow as $stateCell)
                                        <td>{{$stateCell}}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div>Round Key</div>
                        <table class="table">
                            @foreach($key as $keyRow)
                                <tr>
                                    @foreach($keyRow as $keyCell)
                                        <td>{{$keyCell}}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div>Resulting State</div>
                        <table class="table">
                            @foreach($state as $rowIndex => $stateRow)
                                <tr>
                                    @if($rowIndex == 0)
                                        @for($j = 0; $j < 4; $j++)
                                        <td>
                                            <input type="text"
                                                   name="row1[{{$j}}]"
                                                   @if(Auth::user()->isAdmin())
                                                   @if($val = $newState[$rowIndex][$j])@endif
                                                   @else
                                                   @if($val = '')@endif
                                                   @endif
                                                   value="{{old("row1.$j")?:$val}}"
                                                   style="width: 40px">
                                        </td>
                                        @endfor
                                    @else
                                        <td>{{$newState[$rowIndex][0]}}</td>
                                        <td>{{$newState[$rowIndex][1]}}</td>
                                        <td>{{$newState[$rowIndex][2]}}</td>
                                        <td>{{$newState[$rowIndex][3]}}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

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
