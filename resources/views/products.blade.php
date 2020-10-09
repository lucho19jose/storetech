@extends('layouts.template')

@section('title', 'Products')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Productos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                      @foreach ($products as $product)
                          <div class="col-4 offset-1">
                            <div class="card" style="width: 18rem;">
                              <img src="https://i.linio.com/p/5d99f8c37e9b386ddf40bd1737b9a4a7-product.webp" class="card-img-top" alt="inpod blanco">
                              <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <p class="card-text">{{$product->description}}</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                              </div>
                            </div>
                          </div> 
                      @endforeach
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection