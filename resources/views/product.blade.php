@extends('layouts.template')
{{-- @extends('layouts.app') --}}

@section('title', 'Product')

@section('content')
<div class="container">
    {{-- <div class="row">
      <h2>Mame</h2>
    </div> --}}
    <div class="row justify-content-center">
        <div class="col-md-8 pt-4">
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
                      <div class="row">
                        <div class="col-12 col-md-10 offset-md-1">
                          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              {{-- <div class="carousel-item active">
                                      <img src="https://support.apple.com/library/content/dam/edam/applecare/images/en_US/applewatch/watchos7-series5-watch-face-edit-complication.jpg" class="d-block w-100" alt="...">    
                              </div> --}}
                              <?php $item = 0 ?>
                                @if ($images)
                                  @foreach ($images as $image)
                                    @if ($item == 0)
                                      <div class="carousel-item active">
                                        <img id="showProduct" src="{{ $image->get_image }}" class="d-block w-120" alt="...">    
                                      </div>    
                                    @else
                                      <div class="carousel-item">
                                        <img id="showProduct" src="{{ $image->get_image }}" class="d-block w-120" alt="...">    
                                      </div>    
                                    @endif
                                    <?php $item++ ?>                                   
                                  @endforeach 
                                @endif

                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                  {{--         @if ($images)
                            @foreach ($images as $image)
                              <img src="{{ $image->get_image }}" class="card-img-top" alt="{{ $image->id }}">
                            @endforeach     
                          @endif --}}
                        </div>
                      </div>
                      {{-- section Comentary --}}
                      <div class="row">
                        <div class="col">
                          <br><h4>Coments</h4>
                          <form action=" {{ route('coments', $product) }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group">
                              <label for="content">Content</label>
                              <textarea name="content" rows="6" class="form-control" id="validationCustom01" required></textarea>
                              <small id="emailHelp" class="form-text text-muted">feedback :)</small>
                              <div class="invalid-feedback">
                                Please login and comment.
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                        </div>
                      </div>
                      {{-- listar comentarios --}}
                      <div class="row pt-2">
                        <div class="col">
                          @foreach ($comments as $comment)
                            <div class="card mt-1">
                              <div class="card-body">
                              <small>{{ $comment->get_author->name}} - {{ $comment->created_at->format('d M Y')}}</small>
                                <p> Said: {{ $comment->content}}</p>
                              </div>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
