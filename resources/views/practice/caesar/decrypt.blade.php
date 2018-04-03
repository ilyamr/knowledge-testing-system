@extends('app.layout')

@section('child')
    <div class="page">
        <h1>{{$topic->title}}</h1>
        @if($t=\App\Topic::THEORY_TYPE) @endif
        <ul class="dots">
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
            Decrypt your encrypted message
        </div>
        <p>
            Shift(n): {{$n = $topic->getTyped('n')}}
        </p>
        <div class="showTheory">Теорія і приклад</div>
        <div class="theory" style="display: none">
            <p>
                Caesar's alphabet:
            </p>
            <table class="table table-bordered">
                <tr>
                    @foreach($a = range('a', 'z') as $letter)
                        <td>{{$letter}}</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach($shiftedA = array_shift_circular(range('a', 'z'), (int)$topic->getTyped('n')) as $shiftedLetter)
                        <td>{{$shiftedLetter}}</td>
                    @endforeach
                </tr>
            </table>
            <p>
                Я отримав твоє зашифроване повідомлення. Тепер для того щоби впевнитися що все добре давай розшифруємо його.
                Ти маєш повідомлення(шифровані). Тепер використовуючи зміщення рошифруй повідомлення.
            </p>
            <p>
                <em>Приклад.</em> Для прикладу, треба розшифрувати отриманий символ "r". Розшифровуючи його зі зміщенням {{$n}}
                отримаємо літеру <code>{{array_combine($shiftedA, $a)['r']}}</code>. Дивись табличку вище.
            </p>
        </div>
        <div class="form">
            <form method="post" action="/caesar/practice">
                @for($i = 0; $i < count($topic->getTyped('cryptedName')); $i++)
                    @if($c = $topic->getTyped('cryptedName')[$i]) @endif
                    <label style="display: inline-block; margin: 1em; width: 80px;text-align: center">
                        <code>{{$c}}</code></br>
                        <input type="text" style="width: 80px" name="decryptedName[{{$i}}]" value="{{old('decryptedName.' . $i)}}"/>
                    </label>
                @endfor

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
