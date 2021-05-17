<!doctype html>
<html lang="en" class="h-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Jean Lionel NININAHAZWE">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>AJET BURUNDI</title>

 {{--  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sticky-footer-navbar/"> --}}

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
  <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
  <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">

  <link rel="stylesheet" href="{{ asset('css/print.min.css') }}">
  
  <meta name="theme-color" content="#563d7c">


  <style>
    .fas{
      font-size: 24px;
    }
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    .active{
      background: white;
    }
    main .container {

      padding-top: 0px; 
    }

    a i.fa {
      font-size:20px;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="sticky-footer-navbar.css" rel="stylesheet">

   @livewireStyles
</head>
<body class="d-flex flex-column h-100">
  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-light badge-warning">
      <a class="navbar-brand" href="#"><h4> <i class="fas fa-house-user"></i> UBUNTU</h4></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          {{-- <li class="nav-item active">
            <a class="nav-link" href="#">ACCUEIL <span class="sr-only">(current)</span></a>
          </li> --}}

          @can('is-admin')
          <li class="nav-item">
            <a class="nav-link {{ setActiveRouter('people.index') }}" href="{{ route('people.index') }}"><i class='fa fa-list'> Membre</i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-location-arrow"> Region</i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('collines.index') }}">Enregistrement des colines</a>
              <a class="dropdown-item" href="{{ route('groupements.index') }}">Création des Groupements de base</a>
              
              
            </div>
          </li>

          @endcan

          @cannot('is-member')

           <li class="nav-item">
            <a class="nav-link {{ setActiveRouter('contributions.index') }}" href="{{ route('contributions.index') }}"> <i class="fa fa-creative-commons">Contribution</i></a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ setActiveRouter('people.create') }}" href="{{ route('people.create') }}"> <i class="fa fa-user-plus">Adhésion dans L.C.P.C</i></a>
          </li>

          @endcannot

          @can('is-admin')

          <li class="nav-item">
            <a class="nav-link {{ setActiveRouter('rapport.index') }}" href="{{ route('rapport.index') }}"><i class="fa fa-bar-chart">Rapport</i></a>
          </li>
        <li class="nav-item">
            <a class="nav-link {{ setActiveRouter('articles.index') }}" href="{{ route('articles.index') }}"> <i class="fa fa-chain-broken">Site</i></a>
          </li>



          <li class="nav-item">
            <a class="nav-link {{ setActiveRouter('users.index') }}" href="{{ route('users.index') }}"><i class="fa fa-user-md">Utilisateur</i></a>
          </li>

          @endcan
          <li class="nav-item">

             <a class="nav-link {{ setActiveRouter('users-info') }}" href="{{ route('users-info') }}"><i class="fa fa-info-circle"> Compte du Membre</i></a>
            
          </li>


        </ul>
        {{-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
 --}}

        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link class="btn btn-outline-success my-2 my-sm-0" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                             
                                                            <i class="  fa fa-unlock-alt">    {{ __('Se Déconnecter') }}</i>
                            </x-jet-dropdown-link>
                        </form>
      </div>
    </nav>

  </header>

  <!-- Begin page content -->
  <main role="main" class="flex-shrink-0">
    <div class="container-fluid">

      @yield('content')

    </div>
  </main>

  <footer class="footer mt-auto py-3">
    <div class="container text-center">
      <span class="text-muted">AEJT  &copy;  <i>BURUNDI</i></span>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
 @livewireScripts

 <script type="text/javascript" src="{{ asset('js/print.min.js') }}"></script>

 @stack('scripts')

 @yield('javascript')

</body>
</html>