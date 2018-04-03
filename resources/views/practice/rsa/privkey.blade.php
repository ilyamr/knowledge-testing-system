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
            Calculate your <code>private</code> exponent
        </div>
        <p>
            p: {{$topic->getTyped('p')}} </br>
            q: {{$topic->getTyped('q')}} </br>
            n: {{$topic->getTyped('n')}} </br>
            φ(n): {{$topic->getTyped('phin')}} </br>
            e: {{$topic->getTyped('e')}}
        </p>
        <div class="showTheory">Теорія і приклад</div>
        <div class="theory" style="display: none">
            <p>
                Вже обчислена публічна експонента і число φ (phi). Пора обчислити секретну експоненту - число <code>d</code>,
                яке є мультиплікативно обернене до числа <code>e</code> за модулем φ(n). Число <code>d</code> знаходять
                за допомогою <a target="_blank" href="https://uk.wikipedia.org/wiki/Розширений_алгоритм_Евкліда" title="Розширений алгоритм Евкліда">розширеного алгоритму Евкліда</a>
            </p>
            <p>
                <em>Приклад.</em> Для p = 3, q = 11, φ(n) = 20, e = 7<br/>
                - <code>d</code>: <img class="mwe-math-fallback-image-inline tex" alt="ed\equiv 1\pmod{\varphi(n)}" src="//upload.wikimedia.org/math/d/7/9/d7998ec2b2f5cc146604cfacce997597.png">,
                d = 3: de = 3*7 mod 20 = 21 mod 20 = 1<br/>
            </p>
        </div>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice">
                <label>d:
                    <input type="text" name="d"/>
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
