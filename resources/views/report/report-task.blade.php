@extends('report.report-template')

@section('title', 'Teste de pdf')

@section('content')
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Descrição</th>
            <th scope="col">Data de cadastro</th>
            <th scope="col">Usuário</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <th scope="row">{{$task->id}}</th>
            <td>{{$task->descricao}}</td>
            <td>{{date('d/m/Y H:i', strtotime($task->created_at))}}</td>
            <td>{{$task->userDestino->nome}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<style>
    .report-title {
        width: 100%;
        text-align: center;
    }
</style>