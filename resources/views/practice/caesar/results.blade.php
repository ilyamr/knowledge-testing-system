@extends('app.layout')

@section('child')
    <div class="page">
        <h1>{{$topic->title}}</h1>
        @if($t=\App\Topic::THEORY_TYPE) @endif
        <ul class="dots">
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
            <form method="post" action="/caesar/practice/results">
                <div class="submit">
                    <input class="btn btn-primary"  onclick="return confirm('Do you really want to reset?')" type="submit" name="reset" value="Start again">
                    {{--<a href="#" class="btn btn-default">Skip</a>--}}
                </div>

                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endsection
