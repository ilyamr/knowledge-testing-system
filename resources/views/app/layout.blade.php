@extends('layouts.app')

@section('content')
    <div class="actions">
        <a class="btn btn-primary" href="/{{$topic->getIdentifier()}}">Theory</a>
        <a class="btn btn-primary" href="/{{$topic->getIdentifier()}}/tests">Tests</a>
        <a class="btn btn-primary" href="/{{$topic->getIdentifier()}}/practice">Practice</a>
    </div>

    @yield('child')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.showTheory').click(function(){
                var $theory = $('.theory');
                if(!$theory.is(':visible')) {
                    $theory.show();
                }
                else {
                    $theory.hide();
                }
            });
        });
    </script>
@endsection
