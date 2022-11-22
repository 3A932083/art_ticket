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
                      <a class="nav-link link-light text-end" href="#!">會員</a>
                  </div>
              </div>
          </div>

        </div>
    </div>
</nav>

