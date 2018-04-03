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
            Crypt your entered message
        </div>
        <p>
            n: {{$topic->getTyped('n')}} </br>
            e: {{$topic->getTyped('e')}} </br>
            d: {{$topic->getTyped('d')}}
        </p>
        <div class="showTheory">Теорія і приклад</div>
        <div class="theory" style="display: none">
            <p>
                Окей, ексоненти обчислені. Ти отримав пари <code><em>P = (e, n)</em></code> та <code><em>S = (d, n)</em></code>,
                які є відповідно відкритим на закритим ключами RSA. Прийшов час зашифрувати повідомлення.
                Для зручності, швидкості і спрощення роботи я розбив його по символах, і перевів їх в числа.
            </p>
            <p>
                <em>Приклад.</em> Для прикладу, треба зашифрувати число 18. Для того, щоб зашифрувати це повідомлення
                використаємо формулу <img class="mwe-math-fallback-image-inline tex" alt="c=m^e\bmod\,n \," src="//upload.wikimedia.org/math/9/5/b/95ba6d571314e194302b6e8969f5621b.png"><br/>
                Обчисливши, маємо с = {{gmp_strval(gmp_mod(gmp_pow(gmp_init(18), (int)$topic->getTyped('e')), $topic->getTyped('n')))}}
            </p>
        </div>
        <div class="form">
            <form method="post" action="/3/practice">
                @if($str = $topic->getTyped('name')) @endif
                @for($i = 0; $i < strlen($str); $i++)
                    @if($char = $str[$i]) @endif
                    <label style="display: inline-block; margin: 1em; width: 80px;text-align: center">
                        {{$char}}</br>
                        <code>{{ord($char)}}</code></br>
                        <input type="text" style="width: 80px" name="cryptedName[{{$i}}]" value="{{old('cryptedName.' . $i)}}"/>
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
