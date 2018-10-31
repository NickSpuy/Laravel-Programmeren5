<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 10px">
  <div class="container">
    <a class="navbar-brand" href="/">{{config('app.name', 'Webshop')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <li><a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a></li>
        <li><a class="nav-link" href="/posts">Blog <span class="sr-only">(current)</span></a></li>
        <li><a class="nav-link" href="/posts/create">Create Post <span class="sr-only">(current)</span></a></li>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="GET">
          <input class="form-check-input" type="checkbox" value="kees" name="nameTable" id="nameTable">
              <select class="form-control" name="dropdown" id="dropdown">
                <option value="title" name="dropdown" id="dropdown">Title</option>
                <option value="created_at" name="dropdown" id="dropdown">Created At</option>
              </select>
          <input class="form-control mr-sm-2" value="{{request()->input('search')}}" name="search" id="search" type="search" placeholder="Search" aria-label="Search">
        </form>
        
        <!-- Authentication Links -->
        @guest
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
          <li class="nav-item">
            @if (Route::has('register'))
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
          </li>
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }} <span class="caret"></span></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/dashboard">Dashboard</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>