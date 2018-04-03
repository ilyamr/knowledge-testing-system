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
            Select p, q and enter your name
        </div>
        <div class="form">
            <form method="post" action="/{{$topic->getIdentifier()}}/practice">
                <label>First prime (p):
                    <select name="p">
                        <option value="13">13</option>
                        <option value="17">17</option>
                        <option value="19">19</option>
                        <option value="23">23</option>
                    </select>
                </label>
                <label>Second prime (q):
                    <select name="q">
                        <option value="29">29</option>
                        <option value="31">31</option>
                        <option value="37">37</option>
                        <option value="41">41</option>
                    </select>
                </label>
                <label>Your name (only a-z accepted):
                    <input type="text" name="name"/>
                </label>

                <div class="submit">
                    <input class="btn btn-primary" type="submit" value="Next">
                    {{--<a href="#" class="btn btn-default">Skip</a>--}}
                </div>

                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endsection
