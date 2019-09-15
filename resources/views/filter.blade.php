
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>ETD</title>

    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
<div id="app" class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">New Search</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto d-flex">
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

  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="/storage/img/etd-search.jpg" alt="ETD" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">ETD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar Menu -->
      <nav class="mt-5">
                  <!-- SEARCH FORM -->
          <form role="search-filter">
          {{ csrf_field() }}
            <div class="input-group input-group-md">
              <input class="form-control form-control-navbar" value="{{ $q }}" name="q" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-success" method="POST" action="/filter" type="submit">
                  Apply
                </button>
              </div>
            </div>
            @auth
            <hr>
            <div class=" form-group card card-teal mt-3">
                  <div class="card-header">
                    <h3 class="card-title">Filter Results</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="form-group col mt-2">
                        <label> Topic</label>
                        <input type="text" name="topic" value="{{ $topic }}" class="form-control mb-2" placeholder="Search Topic">
                        <hr>
                        <div class="d-flex align-items-center">
                            <label> Year</label>
                            <select class="form-control ml-3" name="year">
                            <option value="">Choose Year</option>
                            <option value="2015" <?php if($year == '2015') { ?> selected <?php } ?> >2015</option>
                            <option value="2016" <?php if($year == '2016') { ?> selected <?php } ?> >2016</option>
                            <option value="2017" <?php if($year == '2017') { ?> selected <?php } ?> >2017</option>
                            </select>
                        </div>
                        <hr>
                        <label> Tags</label>
                        <div class="form-group">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="tags" value="" <?php if($tags == "") {echo ' checked="checked"';} ?>>
                            <label class="form-check-label">NONE</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="tags" value="MBA" <?php if($tags == "MBA") {echo ' checked="checked"';} ?>>
                            <label class="form-check-label">MBA</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="tags" value="OMBA" <?php if($tags == "OMBA") {echo ' checked="checked"';} ?>>
                            <label class="form-check-label">Online MBA</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="tags" value="EMBA" <?php if($tags == "EMBA") {echo ' checked="checked"';} ?>>
                            <label class="form-check-label">EMBA</label>
                          </div>
                        </div>
                        <hr>
                        <label> Supervisor</label>
                        <input type="text" name="supervisor" value="{{ $supervisor }}" class="form-control mb-2" placeholder="Supervisor Name">
                        <hr>
                        <label> Author</label>
                        <input type="text" name="author" value="{{ $author }}" class="form-control mb-2" placeholder="Author Name">
                        <div class="input-group-append">
                          <button class="btn btn-success ml-auto mt-5" method="POST" action="/filter" type="submit">
                            Refine
                          </button>
                        </div>
                  </div>
                  <!-- /.card-body -->
            </div>
            @endauth
          </form>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper d-flex justify-content-around">
    <div class="col mt-5">
        @foreach ($resources as $resource)
            <!-- Box Comment -->
            <div class="card card-teal card-widget">
                <div class="card-header">
                    <h4 class="username"><a href="/filter/{{ $resource->id }}">{{ $resource->title }}</a></h4>
                    <hr>
                    <span class="description">{{ $resource->name }} , Supervisor:{{ $resource->supervisor }} , {{ $resource->year }}</span>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p>{{ $resource->abstract }}</p>
                </div>
                <!-- /.card-footer -->
                <div class="card-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm">{{ $resource->tags }}</button>
                </div>
                <!-- /.card-footer -->
            </div>
                <!-- /.card -->
        @endforeach
        @auth
        {{ $resources->appends(Request::except('page'))->links() }}
        @endauth
    </div>  
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
                by@zymh
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="/js/app.js"></script>
</body>
</html>
