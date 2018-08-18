@extends('adminlte::page') 

@section('title', 'Fundos') 

@section('content_header')

<h1>
	Fundos
	<small>Lista</small>
</h1>
<ol class="breadcrumb">
	<li>
		<a href="#">
			<i class="fa fa-dashboard"></i> Fundos</a>
	</li>
	<li>
		<a href="#">Lista</a>
	</li>
</ol>
@stop 

@section('content')

@if( isset($errors) && count($errors) > 0 )

	<div class="alert alert-danger">

	@foreach( $errors->all() as $error)
		<p>{{$error}}</p>
	@endforeach 

	</div>

@endif 

<div class="box">
	<div class="box-header">
		<h3 class="box-title">Fundos Cadastrados</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<!-- /.box-header -->
		<a data-toggle="modal" data-target="b6" id="btnModal6" class="btn btn-primary btn-lg active btn-add">
			<span class="glyphicon glyphicon-plus"></span>Cadastrar</a>
			<p></p>

			<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
			<thead>
				<tr role="row">
					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
						style="width: 150.2px;">Fantasia</th>
					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
						style="width: 350.8px;">Razão Social</th>
					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
						style="width: 187.4px;">C.N.P.J.</th>
					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
						style="width: 135.6px;">Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($Fundos as $fundo)
				<tr role="row" class="odd" id="{{$fundo->id}}">
					<td>{{$fundo->fantasia}}</td>
					<td>{{$fundo->razao_social}}</td>
					<td>{{$fundo->cnpj}}</td>
					<td>
						<a href="{{ route ( 'fundo.edit', $fundo->id ) }}" class="actions edit">
							<span class="btn btn-primary btn-xs glyphicon glyphicon-pencil"></span>
						</a>

						<a data-toggle="modal" data-target="b1" id="btnModal1" class="btn btn-xs btn-danger btnDelete">
							<span class="glyphicon glyphicon-remove"></span></a>

					<!--{!! Form::open(['method' => 'DELETE', 'route'=>['fundo.destroy', $fundo->id], 'style'=> 'display:inline']) !!}
						{!! Form::submit('Excluir',['class'=> 'btn btn-xs btn-danger']) !!}
						{!! Form::close() !!}-->
                	</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th rowspan="1" colspan="1">Fantasia</th>
					<th rowspan="1" colspan="1">Razão Social</th>
					<th rowspan="1" colspan="1">C.N.P.J.</th>
					<th rowspan="1" colspan="1">Ações</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

@if( isset($fundo) ) 
	@component('modals.modal_danger')
		@slot('txtBtnModal')
			Exclusão de Registros
		@endslot
		@slot('triggerModal')
			b1
		@endslot
		@slot('tituloModal')
			Excluindo Registros ... 
		@endslot
		@slot('routeModal')
			fundo.destroy
		@endslot
		@slot('actionModal')
			$fundo->id
		@endslot
		@slot('methodModal')
			DELETE
		@endslot
		@slot('bodyModal')
			<div class='row'>	
				<div class="form-group col-md-12">  <!-- testando tudo -->
					<p>Deseja excluir a fundo: {{$fundo->codigo}} - {{$fundo->fantasia}}?</p>
				</div>
			</div>
		@endslot
		@slot('btnConfirmar')
			Excluir
		@endslot
	@endcomponent
@endif 

	@component('modals.modal_primary')
		@slot('icoBtnModal')
			glyphicon glyphicon-plus
		@endslot
		@slot('txtBtnModal')
			Importar do SIC
		@endslot
		@slot('triggerModal')
			b6
		@endslot
		@slot('tituloModal')
			Novo Fundo
		@endslot
		@slot('actionModal')
			Painel\FundosController@update
		@endslot
		@slot('routeModal')
				fundo.store
		@endslot 
		@slot('methodModal')
			post
		@endslot

		@slot('bodyModal')

		<input type="hidden" name="ativo" value="0">
		<input type="hidden" name="fundo_cd" value="0">
			
		<div class="modal-body row">
			<label for="cnpj">CNPJ</label>
			<input id="cnpj" required type="text">
			<br/>
			<label for="nome">Razão Social</label>
			<input id="nome" type="text">
			<br/>
			<label for="fantasia">Nome Fantasia</label>
			<input id="fantasia" type="text">
			<br/>
			<label for="atividade">Atividade Principal</label>
			<input id="atividade" type="text">
			<br/>
			<label for="telefone">Telefone</label>
			<input id="telefone" required type="text">
			<br/>
			<label for="email">E-mail</label>
			<input id="email" type="text">
			<br/>
			<label for="cep">CEP</label>
			<input id="cep" type="text">
			<br/>
			<label for="logradouro">Logradouro</label>
			<input id="logradouro" type="text">
			<br/>
			<label for="numero">Número</label>
			<input id="numero" type="text">
			<br/>
			<label for="complemento">Complemento</label>
			<input id="complemento" type="text">
			<br/>
			<label for="bairro">Bairro</label>
			<input id="bairro" type="text">
			<br/>
			<label for="uf">Estado</label>
			<select id="uf">
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
		@endslot
		@slot('btnConfirmar')
			Gravar
		@endslot
	@endcomponent
@stop

@section ('js')

	<script type="text/javascript">
		$(document).ready(function(){
			$("#btnModal6").click(function(){
				$("#b6").modal('show');
			});
		});
	</script>

	<script type="text/javascript">
		$('a.btnDelete').on('click', function (e) {
			e.preventDefault();
			var id = $(this).closest('tr').data('id');
			//aqui passamos a ID do registro para dentro do modal, atraveś do click do botão...
			$('#b1').data('id', id).modal('show');
		});
	</script>

	<script type="text/javascript">
		$("#cnpj").focusout(function(){
			//Início do Comando AJAX
			$.ajax({
				//O campo URL diz o caminho de onde virá os dados
				//É importante concatenar o valor digitado no CNPJ
				url: 'cnpj.php?cnpj='+$("#cnpj").val(),
				//Atualização: caso use java, use cnpj.jsp, usando o outro exemplo.
				//Aqui você deve preencher o tipo de dados que será lido,
				//no caso, estamos lendo JSON.
				dataType: 'json',
				//SUCESS é referente a função que será executada caso
				//ele consiga ler a fonte de dados com sucesso.
				//O parâmetro dentro da função se refere ao nome da variável
				//que você vai dar para ler esse objeto.
				success: function(resposta){
					//Confere se houve erro e o imprime
					if(resposta.status == "ERROR"){
						alert(resposta.message + "\nPor favor, digite os dados manualmente.");
						$("#post #nome").focus().select();
						return false;
					}
					//Agora basta definir os valores que você deseja preencher
					//automaticamente nos campos acima.
					$("#post #nome").val(resposta.nome);
					$("#post #fantasia").val(resposta.fantasia);
					$("#post #atividade").val(resposta.atividade_principal[0].text + " (" + resposta.atividade_principal[0].code + ")");
					$("#post #telefone").val(resposta.telefone);
					$("#post #email").val(resposta.email);
					$("#post #logradouro").val(resposta.logradouro);
					$("#post #complemento").val(resposta.complemento);
					$("#post #bairro").val(resposta.bairro);
					$("#post #cidade").val(resposta.municipio);
					$("#post #uf").val(resposta.uf);
					$("#post #cep").val(resposta.cep);
					$("#post #numero").val(resposta.numero);
				}
			});
		});
	</script>
@stop