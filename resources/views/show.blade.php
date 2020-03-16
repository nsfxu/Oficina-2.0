@extends('inc.master')

@section('conteudo-view')

<header>
    <table class="table">

        <thead>
        <tr>    
            <th>#</th>
            <th>Cliente</th>
            <th>Data de Orçamento</th>
            <th>Vendedor</th>
            <th>Descricao</th>
            <th>Valor</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>{{ $orc->id }}</td>
            <td>{{ $orc->Cliente }}</td>
            <td>{{ $orc->DataOrcamento }}</td>
            <td>{{ $orc->Vendedor }}</td>
            <td>{{ $orc->Descricao }}</td>
            <td>{{ 'R$ '.number_format($orc->Valor, 2, ',', '.')}}</td>   
        </tr>
        </tbody>

    </table>        
</header>

@endsection