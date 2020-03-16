@extends('inc.master')

@section('conteudo-view')

@if(session()->get('success'))
  <div class="col-md-12 row">
    <div class="col-md-3"></div>
       <div class="alert alert-success col-md-6">
            {{ session()->get('success') }} 
       </div>  
  </div>     
@endif
      

<div class="row">    
    <div class="container">

        {!! Form::open(['route' => 'searchDate', 'method' => 'get', 'class' => 'form-inline']) !!}       
        
        <label class="mx-sm-2">De: </label>
        @include('inc.form.date', ['date' => 'de', 'attributes' => ['style' => 'width: 250px', 'class' => 'form-control mb-2']])
       
        <label class="mx-sm-3">Até: </label>
        @include('inc.form.date', ['date' => 'ate', 'attributes' => ['style' => 'width: 250px', 'class' => 'form-control mb-2']])

        @include('inc.form.submit', ['input' => 'Pesquisar', 'attributes' => ['class' => 'btn btn-primary mb-2 mx-sm-3']])

        {!! Form::close() !!}
        

        {!! Form::open(['route' => 'search', 'method' => 'get', 'class' => 'form-inline']) !!}

        @include('inc.form.input', ['input' => 'pesquisa', 'attributes' => ['placeholder' => 'Ex... Alexandre', 'class' => 'form-control mb-3', 'required' => 'required']])       
        @include('inc.form.select', ['select' => 'tipo', 'data' => [null => 'Pesquisar por...', '1' => 'Nome do Cliente', '2' => 'Nome do Vendedor'], 'attributes' => ['class' => 'form-control mb-2 mx-sm-3', 'required' => 'required']])   
        
        @include('inc.form.submit', ['input' => 'Pesquisar', 'attributes' => ['class' => 'btn btn-primary mb-3']])

        {!! Form::close() !!}

    </div>
</div>

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
            @forelse ($orc as $x)
            <tr>
                <td>{{ $x->id }}</td>
                <td>{{ $x->Cliente }}</td>
                <td>{{ $x->DataOrcamento }}</td>
                <td>{{ $x->Vendedor }}</td>
                <td>{{ $x->Descricao }}</td>
                <td>{{ 'R$ '.number_format($x->Valor, 2, ',', '.')}}</td>   
                
                <td>
                    {!! Form::open(['route' => ['orcamentos.destroy', $x->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Remover', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    <a href="{{ route('orcamentos.show', $x->id) }}" class="btn btn-primary">Ver mais</a>
                    <a href="{{ route('orcamentos.edit', $x->id) }}" class="btn btn-warning">Editar</a>
                </td> 
            </tr>
            @empty
            <div class="col-md-12 row">
                <div class="col-md-3"></div>
                   <div class="alert alert-danger col-md-6">
                        Sem dados....
                   </div>  
              </div>            
            @endforelse
        </tbody>
    </table>    

    {{ $orc->links() }}
    
    </div>
</div>

@endsection

