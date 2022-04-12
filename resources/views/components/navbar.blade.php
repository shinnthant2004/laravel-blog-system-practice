<nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Creative Coder</a>
      <div class="d-flex">

          @guest
          <a href="/register" class="nav-link">Regist</a>
          <a href="/login" class="nav-link">Login</a>
          @else
         <img src="{{ auth()->user()->avatar }}"
              width="50"
              height="50"
              class="rounded-circle">
          <div class="d-flex align-items-center justify-content-center m-sm-2">
              <h5 class="text-white">{{ auth()->user()->username }}</h5>
          </div>
          <form method="POST" action="/logout">
            @csrf
          <button type="submit" class="nav-link btn btn-link">Logout</button>
          </form>

          @endguest


        <a href="/#blogs" class="nav-link">Blogs</a>
        <a href="/#subscribe" class="nav-link">Subscribe</a>
      </div>
    </div>
  </nav>
