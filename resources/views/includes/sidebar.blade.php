
<ul id="slide-out" class="sidenav sidenav-fixed">
  <li>
      <div class="user-view">
    <div class="background">
      <img src="{{ asset('assets/img/shop3.jpg') }}">
    </div>
    <a href="#user"><img class="circle" src="{{ asset('assets/img/no_image.jpg') }}"></a>
    <a href="#name"><span class="white-text name">Ebuka</span></a>
    <a href="#email"><span class="white-text email">Store Admin</span></a>
  </div>
</li>
<li class="no-padding">
        <ul class="collapsible collapsible-accordion ">
            <li class="">
            <a class="collapsible-header "><span class='left'><i class='material-icons left'>grid_on</i></span>
                <span class='menuText'>Categories</span>
                <span class='right'><i class='material-icons right'>expand_more</i></span>
            </a>
            <div class="collapsible-body">
                <ul>
                    <li class=""><a href="/categories" >View Categories</a></li>
                </ul>
            </div>
            </li>
        </ul>
    </li>
<li class="no-padding">
        <ul class="collapsible collapsible-accordion ">
            <li class="">
            <a class="collapsible-header "><span class='left'><i class='material-icons left'>shopping_basket</i></span>
                <span class='menuText'>Products</span>
                <span class='right'><i class='material-icons right'>expand_more</i></span>
            </a>
            <div class="collapsible-body">
                <ul>
                    <li class=""><a href="/products" >View Products</a></li>
                </ul>
            </div>
            </li>
        </ul>
    </li>
<li class="no-padding">
        <ul class="collapsible collapsible-accordion ">
            <li class="">
            <a class="collapsible-header "><span class='left'><i class='material-icons left'>add_shopping_cart</i></span>
                <span class='menuText'>Sales</span>
                <span class='right'><i class='material-icons right'>expand_more</i></span>
            </a>
            <div class="collapsible-body">
                <ul>
                    <li class=""><a href="/sales" >Make Sale</a></li>
                </ul>
            </div>
            </li>
        </ul>
    </li>
<li class="no-padding">
        <ul class="collapsible collapsible-accordion ">
            <li class="">
            <a class="collapsible-header "><span class='left'><i class='material-icons left'>queue</i></span>
                <span class='menuText'>Purchases</span>
                <span class='right'><i class='material-icons right'>expand_more</i></span>
            </a>
            <div class="collapsible-body">
                <ul>
                    <li class=""><a href="/purchases" >Receive Purchases</a></li>
                </ul>
            </div>
            </li>
        </ul>
    </li>
<li class="no-padding">
        <ul class="collapsible collapsible-accordion ">
            <li class="">
            <a class="collapsible-header "><span class='left'><i class='material-icons left'>library_books</i></span>
                <span class='menuText'>Reports</span>
                <span class='right'><i class='material-icons right'>expand_more</i></span>
            </a>
            <div class="collapsible-body">
                <ul>
                    <li class=""><a href="/reports/purchase" >Purchase Reports</a></li>
                    {{--<li class=""><a href="#" >Inventory Stock Reports </a></li>--}}
                    <li class=""><a href="/reports/sale" >Sales Reports</a></li>
                </ul>
            </div>
            </li>
        </ul>
    </li>
{{--<li class="no-padding">
        <ul class="collapsible collapsible-accordion ">
            <li class="">
            <a class="collapsible-header "><span class='left'><i class='material-icons left'>people</i></span>
                <span class='menuText'>Users</span>
                <span class='right'><i class='material-icons right'>expand_more</i></span>
            </a>
            <div class="collapsible-body">
                <ul>
                    <li class=""><a href="#" >Register User</a></li>
                </ul>
            </div>
            </li>
        </ul>
    </li>--}}
</ul>
      