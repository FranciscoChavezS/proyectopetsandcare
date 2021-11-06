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