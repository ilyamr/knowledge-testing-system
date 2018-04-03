@extends('app.layout')

@section('child')
    <div class="page">
        <h1>{{$topic->title}}</h1>
        @if($t=\App\Topic::THEORY_TYPE) @endif
        <ul class="dots">
            <li class="in-progress"></li>
            <li class=""></li>
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
            Дані для шифрування
        </div>
        <p>
            Введіть ключ та текст, що буде шифруватися.
        </p>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice">
                <div class="input-group">
                    <label for="data">
                        Текст:
                        <input type="text" id="data" name="data" class="form-control">
                    </label>
                </div>

                <div class="input-group" style="margin-top: 2em">
                    <label for="key">
                        Ключ:
                        <input type="text" id="key" name="key" class="form-control">
                    </label>
                </div>

                <div class="submit">
                    <input class="btn btn-primary" type="submit" value="Next">
                    {{--<a href="#" class="btn btn-default">Skip</a>--}}
                </div>

                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endsection
