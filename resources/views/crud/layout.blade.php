<!doctype html>
<html lang="en" dir="rtl">
  <head>
    <style>
      .thg {
        width: 200px; /* Set your desired width here */
      }
    </style>
   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">


    <title>نظام ادارة اجازات الموظفين</title>
  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link text-light" href="{{route('index')}}"> <strong>الرئيسية</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="{{route('create')}}"><strong>انشاء موظف جديد</strong></a>
      </li>
      @guest
      @if (Route::has('login'))
          <li class="nav-item">
              <a class="nav-link text-light" href="{{ route('login') }}">{{ __('دخول') }}</a>
          </li>
      @endif

      @if (Route::has('register'))
          {{-- <li class="nav-item">
              <a class="nav-link text-light" href="{{ route('register') }}">{{ __('اضافة مستخدم') }}</a>
          </li> --}}
      @endif
  @else
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('خروج') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </li>
  @endguest
      <!-- Uncomment the following line when needed -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="">عرض الاجازات</a>
      </li> -->
    </ul>
  </div>
</nav>
    <div class="container">
        @yield('content')
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
 
  </body>
 
</html>