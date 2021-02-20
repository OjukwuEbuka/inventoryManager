@extends('schools.layout.schoollayout')

@section('title', 'Inventory Manager')

@section('content')

<section class="">
    <h4 class="center">DAILY SALES REPORT</h4>
    <div class="row z-depth-1 valign-wrapper borderRound" >
        <div class="col m4 s12" style="border-right:0.1rem {{$school->themeColor}} solid">
            <h5>SELECT DATE:</h5>
        </div>
        <div class="col m4 s12">
            <input type="date" id="reportDate">
        </div>
        <div class="col m4 s12">
            <button class="btn colCode right" id="dailyReportBtn">GET REPORT</button>
        </div>
    </div>

    <div class="hide" id="dateError">
        <h5 class="center red-text">Please Select a Date!</h5>
    </div>
    
    <div class="progress hide">
        <div class="indeterminate colCode"></div>
    </div>
</section>


<section class="hide z-depth-1 borderRound" id="reportsTableSection" >
    <h5 class="center borderBot" id="dateHead"></h5>
    <table id="dailyReportsTable">
        <thead>
            <tr class="rowBord">
                <th>Item No.</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr>
                <td></td>
                <td>SUM TOTAL::</td>
                <td></td>
                <td></td>
                <td id="totalCell"></td>
            </tr>
        </tfoot>
    </table>
</section>

<script type="module" src="{{asset('assets/js/inventoryManager.js')}}"></script>


@endsection