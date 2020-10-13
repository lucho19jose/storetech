@extends('layouts.template')

@section('title', 'Products')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
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
                          <div class="col-12 col-md-5 offset-md-1 pb-4">
                            <div class="card" style="width: 18rem;">
                              @if ($product->image)
                                <img src="{{ $product->get_image }}" class="card-img-top" alt="inpod blanco" height="300px">
                              @else
                                <img src="https://gloimg.gbtcdn.com/images/pdm-provider-img/straight-product-img/20191205/T041749/T0417490608/source-img/204656-8091.jpg_500x500.jpg" class="card-img-top" alt="{{ $product->name}}">   
                              @endif
                              <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <p class="card-text">{{$product->get_excerpt}}...</p>
                                <a href="{{ route('product', $product) }}" class="btn btn-primary">Ver detalles</a>
                              </div>
                            </div>
                          </div> 
                      @endforeach
                      <div class="container">
                        <div class="row">
                          <div class="col offset-1">
                            {{$products->links()}}
                          </div>
                        </div>
                      </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection