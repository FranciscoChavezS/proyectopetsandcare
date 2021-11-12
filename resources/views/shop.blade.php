@extends('layouts.main', ['activePage' => 'shop', 'titlePage' => __('Conoce nuestros productos')])

@section('content')
    <div class="content">
      <div class="col-md-12">
      <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Home</a></li>
            </ol>
        </nav>
      <div class="container-fluid">
         <!-- Mostrar mensaje en post-->
      @if (session('successCart'))
                    <div class="alert alert-success" role="success">
                      {{ session('successCart') }}
                    </div>
            @endif
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
                  <hr>
                  <div class="row">
                    <div class="col-6 text-right">
                      <div class="card-footer ml-auto mr-auto">
                        <form action="{{route('products.addToCart', $product->id) }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="name" value="{{$product->name}}">
                          <input type="hidden" name="price" value="{{$product->price}}">
                          <input type="hidden" name="description" value="{{$product->description}}">
                          <input type="hidden" name="id" value="{{$product->id}}">
                          <input type="number" class="form-control" name="quantity" value="1" required>
                          
                          <button type="submit" class="btn btn-outline-success">Agregar al Carrito</button>
                         </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
      @endforeach
        </div>
    </div>
  </div>
</div>
@endsection
