@extends('layout.dashboard')

@section('title', 'dashboard')

@section('content')

<div class="row greyBack">
    
      <a href="/categories">
        <div class="col m4 s12 linkCard">
          <div class="card-panel flexspace">
            <div class="blue lighten-4 circle pagecut">
              <i class="material-icons small blue-text">person_add</i>
            </div>
            <div class="black-text">
              <h6 class="left">Categories</h6>
            </div>
          </div>
        </div>
      </a>

      <a href="/products">
        <div class="col m4 s12 linkCard">
          <div class="card-panel flexspace">
            <div class="teal accent-1 circle pagecut">
              <i class="material-icons small teal-text">done</i>
            </div>
            <div class="black-text">
              <h6>Products</h6>
            </div>
          </div>
        </div>
      </a>

      <a href="/reports">
        <div class="col m4 s12 linkCard">
          <div class="card-panel flexspace">
            <div class="yellow lighten-4 circle pagecut">
              <i class="material-icons small yellow-text">print</i>
            </div>
            <div class="black-text">
              <h6>Reports</h6>
            </div>
          </div>
        </div>
      </a>

    </div>



@endsection