@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">

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
                  <a href="{{ route('products.show', $product->id) }}" class="post-link"><b>Ver: {{ $product->name }}</b></a>
                  <hr>
                  <div class="row">
                    <div class="col-6 text-right">
                    </div>
                  </div>
                </div>
            </div>
          </div>
      @endforeach
        </div>
    </div>
</div>