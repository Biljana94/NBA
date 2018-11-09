<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>@yield('title')</title> <!--u ovaj yield ubacujemo svaki title sa stranice za prikaz-->
</head>
<body>

    <main role="main" class="container">

        @if ($flash = session('message')) <!--uzeli smo sesiju i ispisali je u neki div; pristupamo poruci preko kljuca koji je napisan u flash()-->
            <div class="alert alert-success">
                {{ $flash }}
            </div>
        @elseif ($flash = session('warning'))
            <div class="alert alert-danger">
                {{ $flash }}
            </div>
        @endif

        @include('layouts.partials.header') <!--ukljucili smo header-->
        <div class="row">
            <div class="col-md-8 blog-main">
                @yield('content') <!--u ovaj yield ubacujemo 'content' sa svake stranice za prikaz-->
            </div><!-- /.blog-main -->


        </div><!-- /.row -->

        @include('layouts.partials.footer') <!--ukljucili smo footer-->

    </main><!-- /.container -->



    
</body>
</html>
