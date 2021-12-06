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
                  <th> Foto </th>
                  <th> Descripción </th>
                  <th> Precio </th>
                </thead>
                
                <tbody>
                  @foreach ($products as $product)
                  <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                      <img src="{{ asset($product->photo)}}" class="img-fluid img-thumbnail" width="120">
                    </td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
                @php
                  $suma=0.0;
                @endphp

                <th> Total a pagar</th>
                <td>
                @foreach ($products as $product)
                  @php
                    $suma+=$product->price; //sumanos los valores del atributo price
                  @endphp  
                @endforeach
                {{$suma}} MXN 
                </td>
                <td>
                      <a class="btn btn-success" href="{{ route('pay') }}">Pagar </a>
                </td>
              </table>
                   
              {{-- {{ $users->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection