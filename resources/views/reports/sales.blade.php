@extends('layout.dashboard')

@section('title', 'Sales Reports')

@section('content')

<h5>Sales Reports</h5>
<div class="section center">
    <div class="row z-depth-1 borderRound" >
        <form method="" action="" id="">
            <div class="col s12 m6 input-field">
                <input type="date" name="day" id="saleDay" class="" style="margin-bottom:0px; width:50%;">
                <button class="btn colCode" id="saleDayBtn" >FETCH</button>
            </div>
            
            <div class="col s12 m6 input-field">
                Search Month:
                <input type="month" name="month" id="saleMonth" class="" style="margin-bottom:0px">
                <button class="btn colCode" id="saleMonthBtn" >FETCH</button>
            </div>
        </form>
    </div>
</div>


<div class="progress hide">
    <div class="indeterminate yellow"></div>
</div>


<div id="saleReports" class="hide">
<h5 class="center">Sales Reports For <span id="reportDate"></span></h5>

<table class="white" id="saleReportsTable">
    <thead>
        <tr>
            <th>Id</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>
</div>

@endsection