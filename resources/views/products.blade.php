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
                              @foreach ($images as $image)
                                @if ($image->product_id == $product->id)
                                  <img src="{{ $image->get_image }}" class="card-img-top" alt="inpod blanco" height="300px">
                                  @break
                                @endif
                              @endforeach
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