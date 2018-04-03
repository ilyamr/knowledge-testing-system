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
            Calculate your public exponent
        </div>
        <p>
            p: {{$topic->getTyped('p')}} </br>
            q: {{$topic->getTyped('q')}} </br>
            n: {{$topic->getTyped('n')}} </br>
            φ(n): {{$topic->getTyped('phin')}}
        </p>
        <div class="showTheory">Теорія і приклад</div>
        <div class="theory" style="display: none">
            <p>
                В реальних випадках публічна експонента обирається досить великою. Зараз же для спрощення обчислень
                рекомендую обрати маленьке число. Число <code>e</code> має бути взаємно просте з <code>φ(n)</code>.
                Зазвичай у якості <code>e</code> беруть прості числа, які містять невелику
                кількість одиничних бітів у двійковому записі (наприклад 17, 257, 65537)
            </p>
            <p>
                <em>Приклад.</em> Для p = 3, q = 11, φ(n) = 20<br/>
                - <code>e</code>: <img class="mwe-math-fallback-image-inline tex" alt="1<e<\varphi(n)" src="//upload.wikimedia.org/math/5/b/8/5b8e85fcd4e4122799d95918630b0264.png">, e = 7<br/>
            </p>
        </div>
        <div class="form">
            <form method="post" action="/3/practice">
                <label>e:
                    <input type="text" name="e"/>
                </label>

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
