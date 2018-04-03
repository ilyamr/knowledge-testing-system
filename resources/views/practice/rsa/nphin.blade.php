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
            Calculate n and φ(n)
        </div>
        <p>
            p: {{$topic->getTyped('p')}} </br>
            q: {{$topic->getTyped('q')}}
        </p>
        <div class="showTheory">Теорія і приклад</div>
        <div class="theory" style="display: none">
            <p>
                Зараз потрібно обчислити добуток(<code>n</code>) i функцію Ейлера(<code>φ(n)</code>) для чисел <code>p</code> і <code>q</code>.
            </p>
            <p>
                <em>Приклад.</em> Для p = 3, q = 11 <br/>
                - <code>n</code>: <img class="mwe-math-fallback-image-inline tex" alt="n=pq \," src="//upload.wikimedia.org/math/6/8/d/68d74ff176503095ac4d06c909b68b6b.png"> = 33<br/>
                - <code>φ(n)</code>:<img class="mwe-math-fallback-image-inline tex" alt="\varphi(n)=(p-1)(q-1)" src="//upload.wikimedia.org/math/1/9/1/1915cfce14913e70fe3c55f697b57167.png"> = 20<br/>
            </p>
        </div>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice">
                <label>n:
                    <input type="text" name="n"/>
                </label>
                <label>phi(n):
                    <input type="text" name="phin"/>
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
