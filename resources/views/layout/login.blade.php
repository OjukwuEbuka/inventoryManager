@include('includes.doc_head')

    <body class="grey lighten-5">
        @include('includes.navbar')
        
        @yield('content')
        
    </body>
    <script src="{{ asset('assets/js/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/util/utility.js') }}"></script>
</html>