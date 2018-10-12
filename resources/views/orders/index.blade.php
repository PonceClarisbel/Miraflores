@extends('adminlte::page')

@section('title', config('app.name'))

@section('content_header')
    <h1>Pedidos</h1>
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<!-- .box-header -->
			<div class="box-header with-border">
				<h3 class="box-title">Listado de pedidos</h3>
				<a href="{{ route('order.create') }}" class="btn btn-success pull-right" title="Crear Pedido"
				data-toggle="tooltip" data-placement="top">Crear Pedido</a>
			</div>
			<!-- /.box-header -->
			<!-- .box-body -->
			<div class="box-body">
				<table id="table" class="table table-bordered table-striped">
					<thead>
						<tr>
                            <th>ID.</th>
							<th>Nombre</th>
                            <th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $order)
						<tr>
                            <td>{{ $order->id }}</td>
							<td>{{ $order->title }}</td>
							<td>
								<a href="{{ route('order.edit', ['order' => $order->id, 'back' => 'index']) }}" class="btn btn-warning" title="Editar Pedido"
									data-toggle="tooltip" data-placement="top">
									<i class="fa fa-edit"></i>
								</a>
								<a href="{{ route('order.destroy', $order->id) }}" class="btn btn-danger" title="Eliminar Pedido"
									data-toggle="tooltip"
									data-placement="top"
									data-method="DELETE"
									data-title="Eliminar Pedido"
									data-confirm-text="Eliminar"
									data-cancel-text="Cancelar">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.box -->
	</div>
</div>
@stop

@section('js')
<script>
	$(function () {
		$('#table').DataTable({
			'paging'      : true,
			'info'        : true,
			'autoWidth'   : false,
			'language': {
				'url': '/vendor/datatables/langs/{{ config('app.locale') }}.json'
			}
		})
	})
</script>
@stop

