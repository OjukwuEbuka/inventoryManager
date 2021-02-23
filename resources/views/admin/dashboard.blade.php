@include('includes.doc_head')

    <body class="padSide">
        @include('includes.navbar')
        @include('includes.sidebar')
        <div class="">

            @yield('content')
        </div>

              
    </body>
    <script src="{{ asset('assets/js/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/util/utility.js') }}"></script>
</html>