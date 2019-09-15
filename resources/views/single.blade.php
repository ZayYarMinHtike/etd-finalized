
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ETD</title>

    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="navbar navbar-white navbar-light">
    <a href="#" class="navbar-brand">
      <img src="/storage/img/etd-search.jpg" alt="ETD" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">ETD</span>
    </a>
    <!-- Left navbar links -->
    <ul class="navbar-nav ml-5">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">New Search</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto mr-3 d-flex">
          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
           @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                    </form>
                </div>
            </li>
          @endguest
      </ul>
  </nav>

  <!-- Content Wrapper. Contains page content -->
  <div class="d-flex justify-content-around">
  
  <div class="col-12">
    <!-- Box Comment -->
    <div class="card card-teal card-widget">
        <div class="card-header">
        <h1 class="username">{{ $resource->title }}</h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="col mb-5">
            <a href="/filter" class="btn btn-success btn-md">Return to Search</a>
        </div>
        <div class="col mb-5">
            <h5>Description</h5>
            <hr>
            <p>{{ $resource->abstract }}</p>
        </div>
        @auth
        <div class="col mb-5">
            <h5>Links and Downloads</h5>
            <hr>
            <a href="#">download the thesis</a>
        </div>
        <div class="col mb-5">
            <h5>Tags</h5>
            <hr>
            <button type="button" class="btn btn-outline-secondary btn-sm">{{ $resource->tags }}</button>
        </div>
        <div class="col mb-5">
            <h5>Additional Fields</h5>
            <hr>
            <div class="col-8">
                <table class="table table-bordered table-striped dataTable" role="grid">
                  <tbody>
                    <tr role="row">
                      <td><strong>Title</strong></td>
                      <td>{{ $resource->title }}</td>
                    </tr>
                    <tr role="row">
                      <td><strong>Topic</strong></td>
                      <td>{{ $resource->topic }}</td>
                    </tr>
                    <tr role="row">
                      <td><strong>Year</strong></td>
                      <td>{{ $resource->year }}</td>
                    </tr>
                    <tr role="row">
                      <td><strong>Author</strong></td>
                      <td>{{ $resource->name }}</td>
                    </tr>
                    <tr role="row">
                      <td><strong>Company</strong></td>
                      <td>{{ $resource->company }}</td>
                    </tr>
                    <tr role="row">
                      <td><strong>Supervisor</strong></td>
                      <td>{{ $resource->supervisor }}</td>
                    </tr>            
                  </tbody>
                </table>
            </div>
        </div>
        @endauth
        <!-- table -->
      </div>
      <!-- card-body -->
      </div>
    <!-- /.card -->
    
  </div>
     
  </div>
  <!-- /.content-wrapper -->
  </div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="/js/app.js"></script>
</body>
</html>
