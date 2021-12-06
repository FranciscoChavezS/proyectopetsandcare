@extends('layouts.main', ['activePage' => 'citas', 'titlePage' => __('¡Reserva tú Cita!')])

@section('content')
<style >
        body {
            background-image: url('../images/per1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
          }
      </style>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <!-- Mostrar mensaje en post-->
      @if (session('mensajeCitas'))
                    <div class="alert alert-success" role="success">
                      {{ session('mensajeCitas') }}
                    </div>
            @endif
        <!--FORMULARIO SUBIR ARCHIVOS--> 
        <form method="POST" action="{{ route('citas.store') }}" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="card ">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Citas</h4>
              <p class="card-category">Crear tus citas</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                       <div class="col-sm-7">
                         <a href="{{ route('citas.create') }}" class="btn btn-sm btn-facebook">Añadir Cita</a>
                         </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>  


<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="table-responsive">
              <table class="table ">
                <thead class="text-primary">
                 <tr>
                    <th> ID </th>
                    <th> Nombre </th>
                    <th> Raza </th>
                    <th> Sexo </th>
                    <th> Telefono </th>
                    <th> Motivo </th>
                    <th> Dia </th>
                    <th> Hora </th>
                    <th> Usuario </th>
                 </tr>
                </thead>
                 <tbody>
                     @foreach ($citas as $cita)
                      <tr>
                        <td> {{ $cita->id }} </td>
                        <td> {{ $cita->nombremas }} </td>
                        <td> {{ $cita->razamas }} </td>
                        <td> {{ $cita->sexomas }} </td>
                        <td> {{ $cita->telefonomas }} </td>
                        <td> {{ $cita->caso }} </td>
                        <td> {{ $cita->started_at }} </td>
                        <td> {{ $cita->hora }} </td>
                        <td>{{ $cita->user->name }}</td>
                      </tr>
                     @endforeach
                     
                 </tbody>
              </table>
            <!--End body-->

            <!--Button
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-facebook">Guardar</button>
            </div>-->
            <!--End button-->
          </div>
        <!--FIN DE FORMULARIO CARGAR ARCHIVOS--->  
            </div>
        </div>
    </div>
</div>

@endsection