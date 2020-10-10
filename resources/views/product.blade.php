@extends('layouts.template')
{{-- @extends('layouts.app') --}}

@section('title', 'Product')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ $product->name }}</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                      {{-- show iframe --}}
                      <div class="row">
                        <div class="col">
                          @if ($product->iframe)
                            <div class="embed-responsive embed-responsive-16by9">
                              {{!! $product->iframe !!}}
                            </div>     
                          @endif
                        </div>
                      </div>
                      {{-- /show iframe --}}
                      {{-- data of the product --}}
                      <div class="row">
                        <div class="col">
                          {{ $product->description}}
                          <br><br>
                          @if ($product->category_id == 1)
                            <small><strong>category:</strong> Inpods</small>
                          @else
                            <small><strong>category:</strong> another</small>   
                          @endif
                          <br><br>
                          
                        </div>
                      </div>
                      {{-- /data of the product --}}
                      {{-- img if it exist --}}
                      <div class="row">
                        <div class="col-6">
                          @if ($product->image)
                            <img src="{{ $product->get_image }}" class="card-img-top" alt="{{ $product->name }}">     
                          @endif
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
