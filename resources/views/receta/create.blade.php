@extends('master')

@section('content')

<div align="center">
Crear receta
</div>

{!!Form::open(['action'=>'RecetaController@store', 'method'=>'POST'])!!}
	<div class="form-group" >
		{!!Form::label('Nombre: ')!!}
		{!!Form::text('descripcion_r',null,['class'=>'form-control','placeholder'=>'Nombre receta','autofocus'])!!}
	</div>
	<div class="form-group" >
		{!!Form::label('Precio: ')!!}
		{!!Form::text('precio',null,['class'=>'form-control','placeholder'=>'Precio del plato'])!!}
	</div>
	<div class="form-group" >
		{!!Form::label('Costo: ')!!}
		{!!Form::text('costo',null,['class'=>'form-control','placeholder'=>'Costo?'])!!}
	</div>

	<div class="form-group">

		{!! Form::label('Tipo de receta :') !!}

		{!! Form::select( 'id_tipo_receta' , $tiporeceta,  null,  ['id' => 'tiporeceta', 'class' => 'form-control'] ) !!}


	</div>



{!!Form::submit('Registrar',['class'=>'btn btn-primary']) !!}

	<input type="button" value="Cancelar" class="btn btn-danger" onclick= "self.location.href = '../tipoReceta' "/>

{!!Form::close()!!}



@endsection

