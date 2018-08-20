@extends('adminlte::page') 
@section('title', 'Fundos') 

@section('content_header')
<h1>
	Fundo
</h1>
@stop 

@section('content') 

@if( isset($errors) && count($errors) > 0 )

	<div class="alert alert-danger">

	@foreach( $errors->all() as $error)
		<p>{{$error}}</p>
	@endforeach 

	</div>

@endif 

@if( isset($Fundos) ) 
	{!! Form::model($Fundos, ['route' => ['fundo.update', $Fundos->id], 'class' => 'form', 'method' => 'put']) !!} 
@else 
	{!! Form::open(['route' => 'fundo.store', 'class' => 'form'])!!} 
@endif

<input type="hidden" name="ativo" value="0">
<input type="hidden" name="tipo" value="M">
	
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Novo</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<!--<form role="form">
				 text input -->
			<div class="col-md-12">
				<div class="form-group col-md-2">
					<label>CNPJ</label>
					{!! Form::text('cnpj',null,['class' => 'form-control', 'maxlength' => '18', 'id'=>"cnpj"]) !!}
				</div>
				<div class="form-group col-md-3">
					<label>Fantasia</label>
					{!! Form::text('fantasia',null,['class' => 'form-control', 'maxlength' => '30', 'id'=>"fantasia"]) !!}
				</div>
				<div class="form-group col-md-7">
					<label>Razão Social</label>
					{!! Form::text('razao_social',null,['class' => 'form-control', 'maxlength' => '60', 'id'=>"nome"]) !!}
				</div>
				<div class="form-group col-md-8">
					<label>Natureza Jurídica</label>
					{!! Form::text('natureza',null,['class' => 'form-control', 'maxlength' => '60', 'id'=>"natureza"]) !!}
					<input type="radio" name="tipo" value="M" id="matriz">
					<label for="matriz">Matriz</label>
					<input type="radio" name="tipo" value="F" id="filial">
					<label for="filial">Filial</label>
				</div>
				<div class="form-group col-md-2">
					<label>C.E.P.</label>
					{!! Form::text('cep',null,['class' => 'form-control', 'maxlength' => '10', 'id'=>"cep"]) !!}
				</div>
				<div class="form-group col-md-8">
					<label>Logradouro</label>
					{!! Form::text('logradouro',null,['class' => 'form-control', 'maxlength' => '40', 'id'=>'logradouro']) !!}
				</div>
				<div class="form-group col-md-2">
					<label>Número</label>
					{!! Form::number('numero',null,['class' => 'form-control', 'maxlength' => '6', 'id'=>"numero"]) !!}
				</div>
				<div class="form-group col-md-2">
					<label>Complemento</label>
					{!! Form::text('compl',null,['class' => 'form-control', 'maxlength' => '30', 'id'=>'complemento']) !!}
				</div>
				<div class="form-group col-md-4">
					<label>Bairro</label>
					{!! Form::text('bairro',null,['class' => 'form-control', 'maxlength' => '30', 'id'=>'bairro']) !!}
				</div>
				<div class="form-group col-md-4">
					<label>Cidade</label>
					{!! Form::text('cidade',null,['class' => 'form-control', 'maxlength' => '30', 'id'=>'cidade']) !!}
				</div>
				<div class="form-group col-md-2">
					<label>Estado</label>
					{!! Form::text('estado',null,['class' => 'form-control', 'maxlength' => '2', 'id'=>'uf']) !!}
				</div>
				<div class="form-group col-md-2">
					<label>IBGE</label>
					{!! Form::number('ibge',null,['class' => 'form-control', 'maxlength' => '7', 'id'=>"ibge"]) !!}
					<label>Ativo?</label>
					<input type="checkbox" id="ativo">
				</div>
			</div>
		</div>
	</div>
	<div class="box-footer">
		<button type="submit" class="btn btn-primary" accesskey="G">Gravar</button>
		<button type="reset" class="btn btn-warning" accesskey="R">Redefinir</button>
	</div>
</form>
@stop 
@section ('js')
	<script type="text/javascript">
		$(document).ready(function(){
		//$("#cep").inputmask("99999-999");
		//$("#cnpj").inputmask("99.999.999/9999-99");
		//});
		function alteraMaiusculo(){
			var valor = document.getElementById("fantasia").texto;
			var novoTexto = valor.value.toUpperCase();
			valor.value = novoTexto;
		}});
	</script>
	<script type="text/javascript">
		$("#cnpj").focusout(function(){
			$.ajax({
				type:"GET",
				data: {'cnpj': $("#cnpj").val()},
				url: "{{route ('fundos.cnpj') }}",
				dataType: 'json',
				success: function(resposta){
					console.log(resposta);
					if(resposta.status == "ERROR"){
						alert(resposta.message + "\nPor favor, digite os dados manualmente.");
						$("#post #nome").focus().select();
						return false;
					}
					$("#nome").val(resposta.nome);
					$("#cnpj").val(resposta.cnpj);
					$("#fantasia").val(resposta.fantasia);
					$("#natureza").val(resposta.natJuridica);
					if(resposta.tipo == "MATRIZ"){
						document.getElementById("matriz").checked = true;
						document.getElementById("filial").checked = false;
						$("#tipo").val('M');
					} else {
						document.getElementById("matriz").checked = false;
						document.getElementById("filial").checked = true;
						$("#tipo").val('F');
					}
					$("#cep").val(resposta.cep);
					$("#logradouro").val(resposta.logradouro);
					$("#numero").val(resposta.numero);
					$("#complemento").val(resposta.complemento);
					$("#bairro").val(resposta.bairro);
					$("#cidade").val(resposta.municipio);
					$("#uf").val(resposta.uf);
					if(resposta.situacao == "ATIVA"){
						document.getElementById("ativo").checked = true;
						$("#ativo").val('1');
					} else {
						document.getElementById("ativo").checked = false;
						$("#ativo").val('0');
					}
					//$("#atividade").val(resposta.atividade_principal[0].text + " (" + resposta.atividade_principal[0].code + ")");
					$("#telefone").val(resposta.telefone);
					$("#email").val(resposta.email);
				}	
			});
		});
	</script>
@stop