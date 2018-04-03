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
            Розширення ключа(Key Expansion)
        </div>
        <p>
            Це перша ітерація для 128-бітного ключа. 
        </p>
        <p>
            Процедура генерації Round Keys з Cipher Key. Обчисліть першу колонку ключа.
        </p>
        <div class="showTheory">Введені дані</div>
        <div class="theory">
            Секретний, криптографічний ключ, який використовується Key Expansion процедурою,
            щоб зробити набір ключів для раундів (Round Keys); може бути представлений як
            прямокутний масив байтів, що має чотири рядки і Nk колонок.
        </div>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice">
                <div class="row">
                        <div style="float: left">
                            <table class="table">
                                <div>Перша колонка</div>
                                @foreach($firstColumn as $i => $value)
                                    <tr><td>{{$value}}</td></tr>
                                @endforeach
                            </table>
                        </div>
                        <div style="float: left">
                            ⊕
                        </div>
                        <div style="float: left">
                            <div>Остання колонка</div>
                            <table class="table">
                                @foreach($lastColumn as $i => $value)
                                    <tr><td>{{$value}}</td></tr>
                                @endforeach
                            </table>
                        </div>
                        <div style="float: left">
                            ⊕
                        </div>
                        <div style="float: left">
                            <div>Rcon</div>
                            <table class="table">
                                @foreach($rconColumn as $i => $value)
                                    <tr><td>{{$value}}</td></tr>
                                @endforeach
                            </table>
                        </div>
                        <div style="float: left">
                            =
                        </div>
                        <div style="float: left">
                            <div>
                                Результат
                            </div>
                            <table class="table">
                                @foreach($resultColumn as $i => $value)
                                    <tr><td>
                                            <input type="text"
                                                   name="column0[{{$i}}]"
                                                   @if(Auth::user()->isAdmin())
                                                    @if($val = $resultColumn[$i])@endif
                                                   @else
                                                    @if($val = '')@endif
                                                   @endif
                                                   value="{{old("column0.$i")?:$val}}"
                                                   style="width: 40px">
                                    </td></tr>
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
