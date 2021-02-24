@extends('admin.dashboard')

@section('title', 'Products')

@section('content')

<h5>Products</h5>

<button class="btn" id="productModalBtn">
    Create New Product
    <i class="material-icons left">add</i>
</button>

    <table class="" id="productTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($prods) > 0)
                @foreach($prods as $prod)
                    <tr id="row{{ $prod->id }}">
                        <td>{{ $prod->id }}</td>
                        <td>{{ $prod->name }}</td>
                        <td>{{ $prod->quantity ?? 0 }}</td>
                        <td>{{ $prod->unit }}</td>
                        <td>{{ $prod->current_price }}</td>
                        <td>
                        <button class="btn btn-floating red deleteBtn" 
                            data-type="product" data-table="productTable"
                             data-id="{{$prod->id}}" title="Delete">
                            <i class="material-icons">delete</i>
                        </button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div id="productModal" class="modal">

        <button class="modal-close waves-effect waves-light white-text btn-flat right" id="close">
            <i class="material-icons">close</i>
        </button>

        <div class="modal-content">
            <form id="productForm">
                <div class="row center">
                    <h5>Create Product</h5>
                    <h6 id="errorText" class="hide red-text"><span class="center">Please fill in all fields!</span></h6>
                    <div class="input-field">
                        <label for="name" >Product Name</label>
                        <input type="text" name="name" id="name" />
                    </div>
                    <div class="input-field">
                        <label for="price" >Product Price</label>
                        <input type="number" name="price" id="price" />
                    </div>
                    <div class="input-field">
                        <select id="unit" name="unit" class="browser-default">
                            <option value=""> Storage Unit </option>
                            <option value="Pc"> Pieces </option>
                            <option value="Pkt"> Packet </option>
                            <option value="Bag"> Bag </option>
                            <option value="Btl"> Bottle </option>
                            <option value="Sct"> Sachet </option>
                            <option value="Ctn"> Carton </option>                        
                        </select>
                    </div>
                    <div class="input-field">
                        <select id="category" name="category" class="browser-default">
                            <option value=""> Product Category </option>
                            @if(count($cats) > 0)
                                @foreach($cats as $cat)
                                <option value="{{$cat->id}}"> {{ $cat->name }} </option>
                                @endforeach                        
                            @endif
                        </select>
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

    @include('includes.deleteModal')

@endsection