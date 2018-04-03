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
            Decrypt your encrypted message
        </div>
        <p>
            n: {{$topic->getTyped('n')}} </br>
            e: {{$topic->getTyped('e')}} </br>
            d: {{$topic->getTyped('d')}}
        </p>
        <div class="showTheory">Теорія і приклад</div>
        <div class="theory" style="display: none">
            <p>
                Я отримав твоє зашифроване повідомлення. Тепер для того щоби впевнитися що все добре давай розшифруємо його.
                Ти маєш повідомлення(шифровані). Тепер використовуючи секретний ключ рошифруй повідомлення.
            </p>
            <p>
                <em>Приклад.</em> Для прикладу, треба розшифрувати число 164. Для того, щоб розшифрувати це повідомлення
                використаємо формулу <img class="mwe-math-fallback-image-inline tex" alt="m=c^d\bmod\,n \," src="//upload.wikimedia.org/math/8/8/5/885965f0d30003f7e2c9a1fb4c05257a.png"><br/>
                Обчисливши маємо m = {{gmp_strval(gmp_mod(gmp_pow(gmp_init(164), (int)$topic->getTyped('d')), $topic->getTyped('n')))}}
            </p>
        </div>
        <div class="form">
            <form method="post" action="/3/practice">
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
