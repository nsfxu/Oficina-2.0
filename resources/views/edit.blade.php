@extends('inc.master')

@section('conteudo-view')

    <div class="container">
        <H1>ATUALIZANDO ORÇAMENTO</H1>

    {!! Form::model($orc, ['route' => ['orcamentos.update', $orc->id], 'method' => 'put']) !!}

        @include('inc.form.input', ['input' => 'Cliente', 'attributes' => ['placeholder' => 'Cliente', 'class' => 'form-control', 'required' => 'required']])
        @include('inc.form.input', ['input' => 'Vendedor', 'attributes' => ['placeholder' => 'Vendedor', 'class' => 'form-control', 'required' => 'required']])
        @include('inc.form.text',  ['text' => 'Descricao', 'attributes' => ['placeholder' => 'Descrição...', 'class' => 'form-control', 'required' => 'required']])
        @include('inc.form.input', ['input' => 'Valor', 'attributes' => ['placeholder' => 'Valor', 'class' => 'form-control', 'required' => 'required', 'id' => 'valor']])

        @include('inc.form.submit', ['input' => 'Atualizar', 'attributes' => ['class' => 'btn btn-primary']])

    {!! Form::close() !!}

    </div>

@endsection

@section('js-view')
<script>
    $(document).ready(function(){
         $('#valor').mask('000000000000000.00', {reverse: true});        
    });
</script>
@endsection

