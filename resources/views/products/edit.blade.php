@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulario de Edición</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('products.update', $product)}}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                    @method('PUT')
                      <div class="form-group">
                        <label for="name">Nombre *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name)}}">
                      </div>
                      <div class="form-group">
                        <label for="image">Imagen *</label>
                        <input type="file" name="file" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="description">Descripcion *</label>
                        <textarea name="description" rows="6" class="form-control" >{{ old('name', $product->description)}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="category_id">Categoria *</label>
                        <select name="category_id" class="form-control">
                          @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{ $product->category_id == $category->id  ? 'selected' : 'no '}} >{{$category->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="iframe">Contenido embebido *</label>
                        <textarea name="iframe" class="form-control">{{ old('iframe', $product->iframe)}}</textarea>
                      </div>
                        @csrf
                        <button type="submit" class="btn btn-sm btn-secondary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

