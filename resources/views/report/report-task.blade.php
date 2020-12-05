@extends('report.report-template')

@section('title', 'Teste de pdf')

@section('content')
<div class="container report-body">
    <div class="item">
        <h4>Nome:</h4>
        <h3>{{$task->nome}}</h3>
    </div>
    <div class="item">
        <h4>Status:</h4>
        @if($task->status == 'A')
        <h3>Aberto</h3>
        @else
        <h3>Fechado</h3>
        @endif
    </div>
    <div class="item">
        <h4>Descrição:</h4>
        <h3>{{$task->descricao}}</h3>
    </div>
    <div class="item">
        <h4>Atualizado em:</h4>
        <h3>{{date('d/m/yyyy', strtotime($task->updated_at))}} as {{date('H:m', strtotime($task->updated_at))}}</h3>
    </div>
</div>
@endsection
<style>
    .report-title {
        width: 100%;
        text-align: center;
    }

    .item {
        border-bottom: 1px solid #dedede;
    }

    .report-body {
        margin-top: 100px;
    }
</style>