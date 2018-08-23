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

<div class="box">
	<div class="box-header">
		<h1 class="box-title">Fundos</h1> <small>Cadastrados</small>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<!-- /.box-header -->
		<a href="{{route('fundo.create')}}" class="btn btn-primary btn-lg active btn-add">
			<span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
			<p></p>

			<table id="crud" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
			<thead>
				<tr role="row">
					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
						style="width: 50.4px;">C.N.P.J.</th>
					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
						style="width: 30.2px;">Cód/Apelido</th>
					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
						style="width: 350.8px;">Fantasia</th>
					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
						style="width: 15.6px;">Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($Fundos as $fundo)
				<tr role="row" class="odd" id="{{$fundo->id}}">
					<td>{{$fundo->cnpj}}</td>
					<td>{{$fundo->codigo}}</td>
					<td>{{$fundo->fantasia}}</td>
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

@stop

@section ('js')
	
<script type="text/javascript">
	$(function () {
		$('#crud').DataTable({
			'paging'      : true,
			'fixedHeader' : true,
			'lengthChange': true,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			'responsive'  : true,
			'dom': '<l<B>f<t>ip>',
			'buttons': [
				{
					extend: 'excelHtml5',
					customize: function( xlsx ) {
						var sheet = xlsx.xl.worksheets['sheet1.xml'];
						$('row c[r^="G"], row c[r^="H"]', sheet).attr( 's', 57);
					},
					footer: true,
					titleAttr: 'Exporta a EXCEL',
					text: '<i class="fa fa-file-excel-o"></i>',
				},
				'csvHtml5',
				{
					extend: 'pdfHtml5',
					orientation: 'landscape',
					pageSize: 'A4',
					title: 'Produtos - OptimusH'
				}
	
			]
		});
	});
	
</script>
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
				url: "{{route ('fundo.cnpj') }}",
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