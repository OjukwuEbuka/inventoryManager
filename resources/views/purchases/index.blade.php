@extends('layout.dashboard')

@section('title', 'Receive Purchases')

@section('content')

<h5 class="center">Receive Purchased Products</h5>

    <table class="white" id="purchaseTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Cost</th>
                <th>New Price</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>

<div class="row">
    <div class="col m12 s12 center">
        <button class="btn" id="purchaseModalBtn">
            Add Product
            <i class="material-icons left">add</i>
        </button> 
    </div>
</div>

<div class="progress hide">
    <div class="indeterminate yellow"></div>
</div>

<div class="row">
    <div class="col m12 s12 center">
        <button class="btn" id="productSubmitBtn">
            Submit
        </button> 
    </div>
</div>

<div id="purchaseModal" class="modal">

<button class="modal-close waves-effect waves-light white-text btn-flat right" id="close">
    <i class="material-icons">close</i>
</button>

<div class="modal-content">
    <form id="purchaseForm">
        <div class="row center">
            <h5>Add Product</h5>
            <h6 id="errorText" class="hide red-text"><span class="center">Please fill in all fields!</span></h6>
            <div class="input-field">
                <select id="name" name="name" class="browser-default">
                    <option value=""> Choose Product </option>
                    @if(count($prods) > 0)
                        @foreach($prods as $prod)
                        <option value="{{$prod->id}}" data-price="{{$prod->price}}"> {{ $prod->name }} </option>
                        @endforeach                        
                    @endif
                </select>
            </div>
            <div class="input-field">
                <label for="quantity" >Quantity</label>
                <input type="text" name="quantity" id="quantity" />
            </div>
            <div class="input-field">
                <label for="cost" >Cost</label>
                <input type="number" name="cost" id="cost" />
            </div>
            <div class="input-field">
                <label for="price" >New Price</label>
                <input type="text" name="price" id="price" />
            </div>
        </div>
        <div class="progress hide">
            <div class="indeterminate yellow"></div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn" id="">SUBMIT</button>
        </div>
    </form>
</div>
</div>

@endsection