<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <div class="container px-lg-5">
        <a class="navbar-brand" href="{{route('home.new')}}">AT.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <div class="container">
              <div class="row ">
                  <div class="navbar-nav col-6  nav" style="color: #fefefe">
                      <a class="nav-link link-light " aria-current="page"  href="{{ route('activity.show') }}">展覽</a>
                      <a class="nav-link link-light" href="{{route('activity.diy')}}">體驗</a>
                      <a class="nav-link link-light" href="{{route('activity.lecture')}}">講座</a>
                  </div>

{{--                  <div class="row">--}}
{{--                      <div class="col-6">.col-6</div>--}}
{{--                      <div class="col-6">.col-6</div>--}}
{{--                  </div>--}}

                  <div class="col-6 " style="color: #fefefe">
                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ms-auto d-flex justify-content-end">
                          <!-- Authentication Links -->
                          @guest
                              @if(Route::has('admin.login'))
                                  <li class="nav-item">
                                      <a class="nav-link " href="{{ route('admin.login') }}">{{ __('管理員登入') }}</a>
                                  </li>
                              @endif

                              @if(Route::has('user.login'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('user.login') }}">{{ __('登入') }}</a>
                                  </li>
                              @endif

                              @if (Route::has('user.register'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('user.register') }}">{{ __('註冊') }}</a>
                                  </li>
                              @endif
                          @else
                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ Auth::guard('web')->user()->name }}
                                  </a>
                          @endguest

                                  @auth
                                  <!--會員登出-->
                                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('user.logout') }}"
                                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                          {{ __('登出') }}
                                      </a>

                                      <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>

                                      <!--會員中心-->
                                      <a class="dropdown-item" href="{{ route('user.index',1) }}"
                                         onclick="event.preventDefault();
                                                     document.getElementById('dashboard-form').submit();">
                                          {{ __('會員中心') }}
                                      </a>

                                      <form id="dashboard-form" action="{{ route('user.index',1) }}" method="GET" class="d-none">
                                          @csrf
                                      </form>
                                  </div>
                                  @endauth

                          </li>
                      </ul>
                  </div>
              </div>
          </div>
        </div>
    </div>
</nav>

