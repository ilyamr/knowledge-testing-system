@extends('app.layout')

@section('child')
    <div class="page">
        <h1>{{$topic->title}}</h1>
        @if($t=\App\Topic::THEORY_TYPE) @endif
        <ul class="dots">
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
            Визначіть результат роботи функції subBytes()
        </div>
        <p>
            Це перша ітерація для 128-бітного ключа.
        </p>
        <p>
            У Вас наявна таблиця state. Визначіть результат роботи subBytes() на першій ітерації.
        </p>
        <div class="showTheory">Введені дані</div>
        <div class="theory">
            <div>
                <div>S-Box</div>
                <p>
                    Для прикладу: 19 стане d4
                </p>
                @include('practice.aes.partial.sbox')
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
                                    @foreach($stateRow as $cellIndex => $stateCell)
                                        <td>
                                            <input type="text"
                                                   name="state1[{{$rowIndex}}][{{$cellIndex}}]"
                                                   @if(Auth::user()->isAdmin())
                                                    @if($val = $newState[$rowIndex][$cellIndex])@endif
                                                   @else
                                                    @if($val = '')@endif
                                                   @endif
                                                   value="{{old("state2.$rowIndex.$cellIndex")?:$val}}"
                                                   style="width: 40px">
                                        </td>
                                    @endforeach
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
