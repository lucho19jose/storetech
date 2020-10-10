@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Productos</div>
                <div class="container mt-2">
                  <a href="{{ route('products.create')}}" class="btn btn-sm btn-primary">Crear nuevo producto</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                      <thead>
                        <tr>
                          <td>ID</td>
                          <td>Name</td>
                          <td colspan="2">Opciones</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($products as $product)
                            <tr>
                              <td>{{$product->id}}</td>
                              <td>{{$product->name}}</td>
                              <td>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm">
                                  Editar
                                </a>
                              </td>
                              <td>
                                <form action="{{ route('products.destroy', $product) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <input type="submit"
                                    value="Eliminar"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Desea Eliminar?...')">
                                </form>
                              </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
