@extends('layouts.main', ['activePage' => 'products', 'titlePage' => 'Detalles del post'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <!-- Mostrar mensaje en post-->
          @if (session('mensajeProduct'))
                    <div class="alert alert-success" role="success">
                      {{ session('mensajeProduct') }}
                    </div>
            @endif
        <div class="card">
          <!--Cabecera o Header-->
          <div class="card-header card-header-primary">
            <h4 class="card-title">Productos</h4>
            <p class="card-category">Vista detallada de {{ $product->name }}</p>
          </div>
          <!--Fin de Header-->
          <!--Body-->

            <div class="card-body">
              <div class="row">
                <!-- Primero -->
                <div class="col-md-4 col-12 justify-content-center mb-5">
                  <div class="card m-auto" style="width: 18rem;">
                    <img src="{{ asset($product->photo)}}" class="card-img-top" alt="">
                      <div class="card-body">
                        <h3 class="card-title my-2">{{ $product->name }}</h3>
                        <h5 class="card-title my-2">Precio: $ {{ $product->price }}</h5>
                      <div class="d-card-text">
                      {{ $product->description }}
                      <div class="d-flex justify-content-center">
                                                    
                      </div>
                    </div>
                  </div>
              </div>
            </div>
                <!--Fin de primero-->
              </div>
              <!--fin de fila-->
            </div>
            <!--fin de body-->

        </div>
        <!--fin de card-->
      </div>
    </div>
  </div>
</div>
@endsection