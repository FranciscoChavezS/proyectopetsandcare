@extends('layouts.main', ['activePage' => 'shop', 'titlePage' => __('Conoce nuestros productos')])

@section('content')
    <div class="content">
      <div class="col-md-12">
      <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </nav>
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
                  <hr>
                  <div class="row">
                    <div class="col-6 text-right">
                    <form action="{{ route('products.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <div class="card-footer ml-auto mr-auto">
                                  <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
                                </div>
                            </form>
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
