<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/stylewhatsapp.css') }}">
    <link  rel="icon"   href="https://drive.google.com/uc?id=1srTWsG4jI1rXFVBwtAy_W0hLtYPRDDJl" type="image/png" />
    <title>AndahuaylasB2B</title>
</head>
<body>
    <h1 class="text-center">B2B Andahuaylas</h1>
    {{-- link whatsapp --}}
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <a href="https://api.whatsapp.com/send?phone=972742928&text=https://api.whatsapp.com/send?phone=972742928&text=Hola!%20quetal%20b2b" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
        </a>
    @include('layouts.partials.header')
    @isset($products)
        @include('layouts.partials.main')       
    @endisset
    @yield('content')
    @include('layouts.partials.footer')
    @include('layouts.partials.scripts')
</body>
</html>