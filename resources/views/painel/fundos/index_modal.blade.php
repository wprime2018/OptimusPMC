@extends('adminlte::page') 

@section('title', 'Fundos') 

@section('content_header')

<h1>
	Fundos
	<small>Lista</small>
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
			Painel\FundosController@cnpj
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
		
		<div class="modal-body">
				<div class="row">
					<div class = "form-group col-md-5">
						<label for="cnpj">CNPJ</label>
						{!! Form::text('cnpj',null,['class' => 'form-control', 'maxlength' => '18', 'id'=>"cnpj"]) !!}
					</div>
					<div class = "form-group col-md-7">
						<label for="nome">Raz.Social</label>
						<input id="nome" type="text" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class = "form-group col-xs-6">
						<label for="fantasia">Fantasia</label>
						<input id="fantasia" required type="text" class="form-control">
					</div>
					<div class = "form-group col-xs-6">
						<label for="email">E-Mail</label>
						<input id="email" type="text" class="form-control">
					</div>
				</div>
			<label for="uf">Estado</label>
			<select id="uf" class="form-control">
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
					$("#atividade").val(resposta.atividade_principal[0].text + " (" + resposta.atividade_principal[0].code + ")");
					$("#telefone").val(resposta.telefone);
					$("#email").val(resposta.email);
					$("#logradouro").val(resposta.logradouro);
					$("#complemento").val(resposta.complemento);
					$("#bairro").val(resposta.bairro);
					$("#cidade").val(resposta.municipio);
					$("#uf").val(resposta.uf);
					$("#cep").val(resposta.cep);
					$("#numero").val(resposta.numero);
				}	
			});
		});
	</script>
@stop