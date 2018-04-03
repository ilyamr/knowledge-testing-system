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
            Визначіть результат роботи функції mixColumns()
        </div>
        <p>
            Це перша ітерація для 128-бітного ключа. 
        </p>
        <p>
            У Вас наявна таблиця state. Визначіть результат роботи mixColumns() на першій ітерації для однієї колонки.
        </p>
        <p>
            Під час цієї операції, кожен стовпчик множиться на матрицю, яка для 128-бітного ключа має вигляд
            <img src="https://uk.wikipedia.org/api/rest_v1/media/math/render/svg/152fc43d12ed16406fae4b6bec585a8e8b7862c1" width="100px" alt="">
        </p>
        <div class="showTheory">Введені дані</div>
        <div class="theory">
            <div>
                <div>
                    <img width="100%" src="https://upload.wikimedia.org/wikipedia/commons/7/76/AES-MixColumns.svg" alt="">
                </div>
            </div>
        </div>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice">

                <div class="row">
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div>Resulting State</div>
                        <table class="table">
                            @foreach($state as $rowIndex => $stateRow)
                                <tr>
                                    <td>{{$newState[$rowIndex][0]}}</td>
                                    <td>
                                        <input type="text"
                                               name="column1[{{$rowIndex}}]"
                                               @if(Auth::user()->isAdmin())
                                               @if($val = $newState[$rowIndex][1])@endif
                                               @else
                                               @if($val = '')@endif
                                               @endif
                                               value="{{old("column1.$rowIndex")?:$val}}"
                                               style="width: 40px">
                                    </td>
                                    <td>{{$newState[$rowIndex][2]}}</td>
                                    <td>{{$newState[$rowIndex][3]}}</td>
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
