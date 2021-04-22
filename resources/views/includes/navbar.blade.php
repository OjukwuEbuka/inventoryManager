<nav id="navbar" class="">
  <div class="nav-wrapper">
      @if(Auth::user())
        <button id="sideNavShow"class="left noBack  hide-on-med-and-down"><i class="material-icons white-text">menu</i></button>
        <a href="#" id="" data-target="slide-out" class="sidenav-trigger  left noBack"><i class="material-icons white-text">menu</i></a>
      @endif
      <a href="#" id="" data-target="mobile-demo" class="sidenav-trigger  right noBack"><i class="material-icons white-text">menu</i></a>
      <a href="{{ Auth::user() ? '/dashboard' : '/'}}" class="brand-logo">
        <span>ChiChi's Mart</span> 
        <i class="material-icons right  hide-on-med-and-down">shopping_cart</i>
      </a>
      <ul class="right hide-on-med-and-down">
        <a href="#" data-target="mobile-demo" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
      @if(!Auth::user())
        <li><a href="/login">Login</a></li>
      @else
        <li><a href="/logout">Logout</a></li>
      @endif
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    @if(!Auth::user())
      <li><a href="/login">Login</a></li>
    @else
      <li><a href="/logout">Logout</a></li>
    @endif
  </ul>


  <!-- <ul id="slide-out" class="sidenav sidenav-fixed">
      <li><a href="#!">First Sidebar Link</a></li>
      <li><a href="#!">Second Sidebar Link</a></li>
  </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->
    