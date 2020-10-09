@extends('layouts.template')
{{-- @extends('layouts.app') --}}

@section('title', 'Product')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $product->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                      <div class="row">
                        <div class="col">
                          {{ $product->description}}
                          <br><br>
                          @if ($product->category_id == 1)
                            <small><strong>category:</strong> Inpods</small>
                          @else
                            <small>another</small>   
                          @endif
                          <br><br>
                          
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <img src="https://images.unsplash.com/photo-1489359413553-6c264fb36c83?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" width="600px">
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
