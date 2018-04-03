@extends('app.layout')

@section('head')
    <script type="text/x-mathjax-config">
      MathJax.Hub.Config({tex2jax: {inlineMath: [
        ['$','$'],
        ['{\\displaystyle ','}\\'],
        ['\\(','\\)'
      ]]}});
    </script>
    <script type="text/javascript" async
            src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
    </script>
    <style>
        table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
        }
    </style>
@endsection

@section('child')
    <div class="page col-md-10 col-md-offset-1">
        {!! $text !!}
    </div>
@endsection
