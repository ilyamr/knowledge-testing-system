@extends('layouts.app')

@section('title')Головна@endsection

@section('head')
    <style>
        .fa-5 {
            font-size: 6em;
            line-height: 2em;
            color: #c0c0c0;
        }
        .icon-circle {
            border-radius: 25em;
            /*padding: 1em;*/
            text-align: center;
            width: 12em;
            height: 12em;
            background-color: #f2f2f2;
            margin: 0 auto;
        }
        .info-box {
            text-align: center;
        }
        .info-box .title {
            font-size: 1.25em;
            margin-top: 1em;
            margin-bottom: .75em;
        }
    </style>
@endsection

@section('content')
    <div class="page">
        <h1>Система оцінювання знань з комп’ютерної криптографії</h1>

        <div class="row">
            <div class="col-md-4 info-box">
                <div class="icon-circle">
                    <i class="fa fa-rocket fa-5" aria-hidden="true"></i>
                </div>
                <div class="title">Швидке проходження тестів</div>
                <div class="description">
                    Проходьте теоретичні та практичні завдання,
                    демонструючи свої навички
                </div>
            </div>
            <div class="col-md-4 info-box">
                <div class="icon-circle">
                    <i class="fa fa-users fa-5" aria-hidden="true"></i>
                </div>
                <div class="title">Персоналізовані профілі</div>
                <div class="description">
                    Завдання підбираються динамічно, залежно
                    від продемонстрованої підготовки
                </div>
            </div>
            <div class="col-md-4 info-box">
                <div class="icon-circle">
                    <i class="fa fa-check-circle-o fa-5" aria-hidden="true"></i>
                </div>
                <div class="title">Об’єктивне оцінювання</div>
                <div class="description">
                    Оцінка залежить лише від того, як ви пройдете
                    низку завдань
                </div>
            </div>
        </div>
    </div>
@endsection
