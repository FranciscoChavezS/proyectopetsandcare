@extends('layouts.main', ['activePage' => 'cart', 'titlePage' => __('Carrito de compras')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="table-responsive">

        <div class="table-responsive">
              <table class="table ">
                <thead class="text-primary">
                  <th> ID </th>
                  <th> Nombre </th>
                  <th> Descripción </th>
                  <th> Precio </th>
                  <th class="text-right"> Acciones </th>
                </thead>
                
                @foreach($products as $product)
                    <div class="col-md-4 col-12 justify-content-center mb-5">
                        <div class="card m-auto" style="width: 18rem;">
                            <img src="{{ asset($product->photo)}}" class="card-img-top" alt="">
                            <div class="card-body">
                              <h3 class="card-title my-2">{{ $product->name }}</h3>
                              <h5 class="card-title my-2">Precio: $ {{ $product->price }}</h5>
                              <div class="d-card-text">
                                {{ $product->description }}
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-6 text-right">
                                  <div class="card-footer ml-auto mr-auto">
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                  @endforeach
                <!-- @php
                  $suma=0.0;
                @endphp

                <th> Total a pagar</th>
                <td>
                @foreach ($products as $product)
                  @php
                    $suma+=$product->price; //sumanos los valores del atributo price
                  @endphp  
                @endforeach
                {{$suma}} MXN -->
                </td>
              </table>
              {{-- {{ $users->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection