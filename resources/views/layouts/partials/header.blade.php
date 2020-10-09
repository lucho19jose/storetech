  <!-- Header -->
  <!-- responsive con grillas cuando se sm =>12 or si es lg =>3 and 9  -->
  <header>
    <nav id="nav" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html"><img src="https://icon-library.com/images/tech-icon-png/tech-icon-png-16.jpg" alt="conf2020" height="50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('products.index') }}">Productos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#speakers">Speakers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#place-time">Inpods</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#conviertete-en-orador">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-platzi" href="#" data-toggle="modal" data-target="#ModalVentas">Comprar
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- /Header -->