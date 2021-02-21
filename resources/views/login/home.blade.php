@extends('login.layout')

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
                    <img src="{{ asset('assets/img/shop1.jpg') }}">
                    <span class="card-title">Card Title</span>
                </div>
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
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
                    <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
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
                    <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
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
                    <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
