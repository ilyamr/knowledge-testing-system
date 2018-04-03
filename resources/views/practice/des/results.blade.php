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
            <li class="done"></li>
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
            Results of your practice
        </div>

        @if($results['n'] === 0)
            <div class="practice practice-error">
                Упс, не правильно обчислене значення <code>n ({{$topic->getTyped('n')}})</code>. Відповідно подальші розрахунки були не вірними.
            </div>
        @elseif($results['n'] === 1)
            <div class="practice practice-success">
                Окей, <code>n</code> розраховано правильно
            </div>
        @endif

        @if($results['phin'] === 0)
            <div class="practice practice-error">
                Упс, не правильно обчислене значення <code>phi(n) ({{$topic->getTyped('phin')}})</code>. Відповідно подальші розрахунки були не вірними.
            </div>
        @elseif($results['phin'] === 1)
            <div class="practice practice-success">
                <code>phi(n)</code> розраховано правильно
            </div>
        @endif

        @if($results['e'] === 0)
            <div class="practice practice-error">
                Упс, не правильно обчислене значення <code>e ({{$topic->getTyped('e')}})</code> (відкрита експонента). Відповідно подальші розрахунки були не вірними.
            </div>
        @elseif($results['e'] === 1)
            <div class="practice practice-success">
                <code>e</code> розраховано правильно
            </div>
        @endif

        @if($results['d'] === 0)
            <div class="practice practice-error">
                Не правильно обчислене значення <code>d ({{$topic->getTyped('d')}})</code> (приватна експонента). Відповідно подальші розрахунки були не вірними.
            </div>
        @elseif($results['d'] === 1)
            <div class="practice practice-success">
                <code>d</code> розраховано правильно
            </div>
        @endif

        @if($results['encrypted'] === 0)
            <div class="practice practice-error">
                Повідомлення зашифровано не вірно

                @if (count($results['msg']['encryption']) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($results['msg']['encryption'] as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @elseif($results['encrypted'] === 1)
            <div class="practice practice-success">
                Повідомлення зашифровано правильно
            </div>
        @endif

        @if($results['decrypted'] === 0)
            <div class="practice practice-error">
                Перевірка шифрування виконана не вірно

                @if (count($results['msg']['decryption']) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($results['msg']['decryption'] as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @elseif($results['decrypted'] === 1)
            <div class="practice practice-success">
                Перевірка шифрування виконана вірно
            </div>
        @endif
        <div class="form">
            <form method="post" action="/3/practice/results">
                <div class="submit">
                    <input class="btn btn-primary"  onclick="return confirm('Do you really want to reset?')" type="submit" name="reset" value="Start again">
                    {{--<a href="#" class="btn btn-default">Skip</a>--}}
                </div>

                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endsection
