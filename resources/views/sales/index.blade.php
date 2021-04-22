@extends('layout.dashboard')

@section('title', 'Make Sale')

@section('content')

<h5 class="center">Make Sale</h5>

<div class="row">
    <div class="col m6 center">
        <h6 class="center">Choose Product</h6>
        <div class="input-field col m8 s12 center">
            <select id="chooseProduct" name="chooseProduct" class="browser-default">
                <option value=""> Choose Product </option>
                @if(count($prods) > 0)
                    @foreach($prods as $prod)
                    <option value="{{$prod->id}}"
                         data-price="{{$prod->current_price}}"
                         data-quantity="{{$prod->quantity}}"
                         data-name="{{$prod->name}}"
                         data-unit="{{$prod->unit}}"
                    >
                          {{ $prod->name }} 
                    </option>
                    @endforeach                        
                @endif
            </select>
        </div>
        <div class="input-field col m4 s12">
                <label for="quantity" >Quantity</label>
                <input type="number" name="quantity" id="quantity" />
            </div>
        <button class="btn" id="addInvoiceBtn">
            Add to Invoice
            <i class="material-icons left">add</i>
        </button> 
    </div>

    <div class="col m1 center">
    </div>

    <div class="col m5 s12 center">
        <h6 class="center">Sales Invoice</h6>
        <table class="white" id="invoice">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
            <tfoot>
                <tr>
                    <th>Total::</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th id="totalCell">0</th>
                </tr>
            </tfoot>
        </table>

        <div class="row">
            <div class="col m12 center">
                <button class="btn" id="saleSubmitBtn">
                    Submit
                </button> 
            </div>
        </div>
    </div>
</div>

<div class="progress hide">
    <div class="indeterminate yellow"></div>
</div>



@endsection