@extends('admin.dashboard')

@section('title', 'Categories')

@section('content')

<h5>Product Categories</h5>

<button class="btn" id="categoryModalBtn">
    Create New Category
    <i class="material-icons left">add</i>
</button>

    <table class="" id="categoryTable">
        <thead>
            <tr>
                <td>S/No.</td>
                <td>Id</td>
                <td>Name</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <div id="categoryModal" class="modal">

        <button class="modal-close waves-effect waves-light white-text btn-flat right" id="close">
            <i class="material-icons">close</i>
        </button>

        <div class="modal-content">
            <form id="CategoryForm">
                <div class="row center">
                    <h5>Create Category</h5>
                    <h6 id="showCreateModalError" class="hide red-text"><span class="center">Please fill in all fields!</span></h6>
                    <div class="input-field">
                        <label for="name" >Category Name</label>
                        <input type="text" name="name" id="name" />
                    </div>
                    <div class="input-field">
                        <label for="description" >Description</label>
                        <input type="text" name="description" id="description" />
                    </div>
                </div>
                <hr>
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