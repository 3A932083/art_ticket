<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <div class="container px-lg-5">
        <a class="navbar-brand" href="{{route('home.new')}}">AT.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <div class="container">
              <div class="row ">
                  <div class="col-10 nav" style="color: #fefefe">
                      <a class="nav-link link-light" aria-current="page"  href="{{ route('activity.show') }}">展覽</a>
                      <a class="nav-link link-light" href="{{route('activity.diy')}}">體驗</a>
                      <a class="nav-link link-light" href="{{route('activity.lecture')}}">講座</a>
                  </div>
                  <div class="col" style="color: #fefefe">
                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ms-auto">
                          <!-- Authentication Links -->
                          @guest
                              @if (Route::has('login'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('login') }}">{{ __('登入') }}</a>
                                  </li>
                              @endif

                              @if (Route::has('register'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('register') }}">{{ __('註冊') }}</a>
                                  </li>
                              @endif
                          @else
                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ Auth::user()->name }}
                                  </a>

                                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>

                                      <!--會員中心-->
                                      <a class="dropdown-item" href="{{ route('auth.dashboard.index') }}"
                                         onclick="event.preventDefault();
                                                     document.getElementById('dashboard-form').submit();">
                                          {{ __('會員中心') }}
                                      </a>

                                      <form id="dashboard-form" action="{{ route('auth.dashboard.index') }}" method="GET" class="d-none">
                                          @csrf
                                      </form>
                                  </div>
                              </li>
                          @endguest
                      </ul>
                  </div>
              </div>
          </div>

        </div>
    </div>
</nav>

