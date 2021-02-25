@extends('layout.dashboard')

@section('title', 'Purchase Reports')

@section('content')

<h5>Purchase Reports</h5>
<div class="section center">
    <div class="row z-depth-1 borderRound" >
        <form method="" action="" id="">
            <div class="col s12 m6 input-field">
                <input type="date" name="day" id="purchaseDay" class="" style="margin-bottom:0px; width:50%;">
                <button class="btn colCode" id="purchaseDayBtn" >FETCH</button>
            </div>
            
            <div class="col s12 m6 input-field">
                Search Month:
                <input type="month" name="month" id="purchaseMonth" class="" style="margin-bottom:0px">
                <button class="btn colCode" id="purchaseMonthBtn" >FETCH</button>
            </div>
        </form>
    </div>
</div>


<div class="progress hide">
    <div class="indeterminate yellow"></div>
</div>


<div id="purchaseReports" class="hide">
<h5 class="center">Purchase Reports For <span id="reportDate"></span></h5>

<table class="white" id="purchaseReportsTable">
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