@extends('adminlte::page') 

@section('title', 'Fundos') 

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
<input type="hidden" name="user_cad" value="{{Auth::user()->name}}">
	
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#fundo" data-toggle="tab" aria-expanded="true">Fundo <small>{{$tipoTela}}</small></a></li>
			<li class=""><a href="#responsavel" data-toggle="tab" aria-expanded="false">Responsável <small>{{$tipoTela}}</small></a></li>
		{{--<li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Settings</a></li>--}}
		</ul>
		<div class="tab-content">
			<div class="tab-pane" id="fundo">
			<div class="col-md-12">
				<div class="form-group col-md-2">
					<label>CNPJ</label>
					{!! Form::text('cnpj',null,['class' => 'form-control', 'maxlength' => '18', 'id'=>"cnpj"]) !!}
				</div>
				<div class="form-group col-md-2">
					<label>Código/Apelido</label>
					{!! Form::text('codigo',null,['class' => 'form-control', 'maxlength' => '30', 'id'=>"codigo",'onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
				</div>
	
				<div class="form-group col-md-8">
					<label>Fantasia</label>
					{!! Form::text('fantasia',null,['class' => 'form-control', 'maxlength' => '30', 'id'=>"fantasia"]) !!}
				</div>
				<div class="form-group col-md-6">
					<label>Razão Social</label>
					{!! Form::text('razao_social',null,['class' => 'form-control', 'maxlength' => '60', 'id'=>"nome"]) !!}
				</div>
				<div class="form-group col-md-6">
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
					{!! Form::text('numero',null,['class' => 'form-control', 'maxlength' => '10', 'id'=>"numero"]) !!}
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
					<label for="uf">Estado</label>
					<select name="estado" id="uf" class="form-control">
						<option value="AC">Acre</option>
						<option value="AL">Alagoas</option>
						<option value="AP">Amapá</option>
						<option value="AM">Amazonas</option>
						<option value="BA">Bahia</option>
						<option value="CE">Ceará</option>
						<option value="DF">Distrito Federal</option>
						<option value="ES">Espírito Santo</option>
						<option value="GO">Goiás</option>
						<option value="MA">Maranhão</option>
						<option value="MT">Mato Grosso</option>
						<option value="MS">Mato Grosso do Sul</option>
						<option value="MG">Minas Gerais</option>
						<option value="PA">Pará</option>
						<option value="PB">Paraíba</option>
						<option value="PR">Paraná</option>
						<option value="PE">Pernambuco</option>
						<option value="PI">Piauí</option>
						<option value="RJ">Rio de Janeiro</option>
						<option value="RN">Rio Grande do Norte</option>
						<option value="RS">Rio Grande do Sul</option>
						<option value="RO">Rondônia</option>
						<option value="RR">Roraima</option>
						<option value="SC">Santa Catarina</option>
						<option value="SP">São Paulo</option>
						<option value="SE">Sergipe</option>
						<option value="TO">Tocantins</option>
					</select>		
				</div>
				<div class="form-group col-md-2">
					<label>IBGE</label>
					{!! Form::number('ibge',null,['class' => 'form-control', 'maxlength' => '7', 'id'=>"ibge"]) !!}
					<label>Ativo?</label>
					<input type="checkbox" id="ativo">
				</div>
			</div>
		</div>
		<div class="tab-pane" id="responsavel">
			<div class="col-md-12">
				<div class="form-group col-md-2">
					<label>CPF</label>
					{!! Form::text('cpf',null,['class' => 'form-control', 'maxlength' => '14', 'id'=>"cpf", 'placeholder' => 'Somente Números']) !!}
				</div>
				<div class="form-group col-md-2">
					<label>PIS/PASEP</label>
					{!! Form::text('pis',null,['class' => 'form-control', 'maxlength' => '14', 'id'=>"pis", 'placeholder' => 'Somente Números']) !!}
				</div>
				<div class="form-group col-md-2">
					<label>RG</label>
					{!! Form::text('rg',null,['class' => 'form-control', 'maxlength' => '14', 'id'=>"rg", 'placeholder' => 'Somente Números']) !!}
				</div>
				<div class="form-group col-md-2">
					<label>Titulo Eleitor</label>
					{!! Form::text('titulo',null,['class' => 'form-control', 'maxlength' => '12', 'id'=>"titulo", 'placeholder' => 'Somente Números']) !!}
				</div>
				<div class="form-group col-md-2">
					<label>CNH</label>
					{!! Form::text('cnh',null,['class' => 'form-control', 'maxlength' => '12', 'id'=>"cnh", 'placeholder' => 'Somente Números']) !!}
				</div>
				<div class="form-group col-md-2">
					<label>CEP</label>
					{!! Form::text('cepResp',null,['class' => 'form-control', 'maxlength' => '12', 'id'=>"cepResp", 'placeholder' => 'Somente Números']) !!}
				</div>
				<div class="form-group col-md-12">
					<label>Nome Completo</label>
					{!! Form::text('nomeResp',null,['class' => 'form-control', 'maxlength' => '50', 'id'=>"nomeResp",'onkeyup'=>'javascript:this.value=this.value.toUpperCase();']) !!}
				</div>
				<div class="form-group col-md-10">
					<label>Logradouro</label>
					{!! Form::text('logradouroResp',null,['class' => 'form-control', 'maxlength' => '40', 'id'=>'logradouroResp']) !!}
				</div>
				<div class="form-group col-md-2">
					<label>Número</label>
					{!! Form::text('numeroResp',null,['class' => 'form-control', 'maxlength' => '10', 'id'=>"numeroResp"]) !!}
				</div>
				<div class="form-group col-md-4">
					<label>Complemento</label>
					{!! Form::text('complResp',null,['class' => 'form-control', 'maxlength' => '30', 'id'=>'complResp']) !!}
				</div>
				<div class="form-group col-md-4">
					<label>Bairro</label>
					{!! Form::text('bairroResp',null,['class' => 'form-control', 'maxlength' => '30', 'id'=>'bairroResp']) !!}
				</div>
				<div class="form-group col-md-4">
					<label>Cidade</label>
					{!! Form::text('cidadeResp',null,['class' => 'form-control', 'maxlength' => '30', 'id'=>'cidadeResp']) !!}
				</div>
				<div class="form-group col-md-2">
					<label for="ufResp">Estado</label>
					<select name="estadoResp" id="ufResp" class="form-control">
						<option value="AC">Acre</option>
						<option value="AL">Alagoas</option>
						<option value="AP">Amapá</option>
						<option value="AM">Amazonas</option>
						<option value="BA">Bahia</option>
						<option value="CE">Ceará</option>
						<option value="DF">Distrito Federal</option>
						<option value="ES">Espírito Santo</option>
						<option value="GO">Goiás</option>
						<option value="MA">Maranhão</option>
						<option value="MT">Mato Grosso</option>
						<option value="MS">Mato Grosso do Sul</option>
						<option value="MG">Minas Gerais</option>
						<option value="PA">Pará</option>
						<option value="PB">Paraíba</option>
						<option value="PR">Paraná</option>
						<option value="PE">Pernambuco</option>
						<option value="PI">Piauí</option>
						<option value="RJ">Rio de Janeiro</option>
						<option value="RN">Rio Grande do Norte</option>
						<option value="RS">Rio Grande do Sul</option>
						<option value="RO">Rondônia</option>
						<option value="RR">Roraima</option>
						<option value="SC">Santa Catarina</option>
						<option value="SP">São Paulo</option>
						<option value="SE">Sergipe</option>
						<option value="TO">Tocantins</option>
					</select>		
				</div>
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
	<!-- Finalizando o body do formulário -->
@section ('js')
	<script type="text/javascript">
		$(document).ready(function(){
			function empty(str){
				return !str || !/[^\s]+/.test(str);
			};
	
			if({{$tipoTela}} = "Editando") {
				if({{$Fundos->ativo}} == '1'){ document.getElementById("ativo").checked = true;}
				if($("#tipo").val('M')){ 
					document.getElementById("matriz").checked = true;
					document.getElementById("filial").checked = false;
				} else {
					document.getElementById("filial").checked = true;
					document.getElementById("matriz").checked = false;
				}
				$( "#uf" ).val("{{$Fundos->estado}}");
			}
		});
		$("#cnpj").focusout(function(){
			$.ajax({
				type:"GET",
				data: {'cnpj': $("#cnpj").val()},
				url: "{{route ('fundo.cnpj') }}",
				dataType: 'json',
				success: function(resposta){
					console.log(resposta);
					if(resposta.status = "ERROR"){
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
		$("#pis").focusout(function(){
			$.ajax({
				type:"GET",
				data: {'pis': $("#pis").val()},
				url: "{{route ('validatePis') }}",
				dataType: 'json',
				success: function(resposta){
					//console.log(resposta);
					if(resposta = 'false'){
						alert("Número do PIS inválido!");
						$("#pis").val('');
						$("#pis").focus().select();
						return false;
					} else {
						$.ajax({
							type:"GET",
							data: {'valor': $("#pis").val(), 'mask':'###.#####.##-#'},
							url: "{{route ('validatePis') }}",
							dataType: 'json',
							success: function(resposta){
								//console.log(resposta);
			
					}

				}	
			});
		});
	</script>
@stop