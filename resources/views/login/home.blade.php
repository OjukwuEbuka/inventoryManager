@extends('layout.home')

@section('title', 'ChiChi Mart')

@section('content')

<!-- Carousel Section - Moving Images -->
<section>
  <div class="carousel carousel-slider" id="caro1">
    <a class="carousel-item" href="#one!"><img src="{{ asset('assets/img/shop1.jpg') }}"></a>
    <a class="carousel-item" href="#two!"><img src="{{ asset('assets/img/shop2.jpg') }}"></a>
    <a class="carousel-item" href="#three!"><img src="{{ asset('assets/img/shop3.jpg') }}"></a>
  </div>
</section>

<!-- Top Selling Products section -->
<section class="" id="topsellingsection">
    <h4 class="center grey-text" style="margin-top: 0; background:none">Best Selling Products</h4>

    <div class="row">
        <div class="col s12 m3">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('assets/img/redheels.jpg') }}">
                    <span class="card-title">Red Christian Dior</span>
                </div>
                <div class="card-content">
                    <p>Beautiful red heels for classy ladies by Christian Dior.</p>
                </div>
                <div class="card-action">
                    <a href="#">Christian Dior</a>
                </div>
            </div>
        </div>
        <div class="col s12 m3">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('assets/img/nikesneakers.jpg') }}">
                    <span class="card-title">Nike Canvas</span>
                </div>
                <div class="card-content">
                    <p>Solid black and white Nike canvas for the active person</p>
                </div>
                <div class="card-action">
                    <a href="#">Nike</a>
                </div>
            </div>
        </div>
        <div class="col s12 m3">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('assets/img/beigeheels.jpg') }}">
                    <span class="card-title">Fendi Heels</span>
                </div>
                <div class="card-content">
                    <p>Milk colour Fendi shoes for the chic working lady.</p>
                </div>
                <div class="card-action">
                    <a href="#">Fendi</a>
                </div>
            </div>
        </div>
        <div class="col s12 m3">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('assets/img/shop1.jpg') }}">
                    <span class="card-title">Card Title</span>
                </div>
                <div class="card-content">
                    <p>I am a very simple card.</p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
