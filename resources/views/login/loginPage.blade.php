@extends('layout.login')

@section('title', 'Login Page')

@section('content')

<div class="container" id="loginContainer">

    <div class="loginFrame row center z-depth-1">
        <div class="col s12 offset-m2 m8 center" id="">
            <div class="">
                <h4 class="center">Login</h4>
                <form>
                    <div class="input-field">
                        <label for="username" >USERNAME</label>
                        <input type="text" name="username" id="username" />
                    </div>

                    <div class="input-field">
                        <label for="password" >PASSWORD</label>
                        <input type="password" name="password" id="password" />
                    </div>

                    <div class="center">
                        <button class="btn btn-large grey accent-3" type="submit" name="submit" id="loginSubmit">LOG IN</button>
                    </div>
                    <div class="progress hide colCode">
                        <div class="indeterminate"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="module" src="{{asset('assets/js/loginManager.js')}}"></script>
@endsection