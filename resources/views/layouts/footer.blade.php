
@if (Auth::guest() === 1)
<nav class="navbar">
  <span class="navbar-brand" href="#">&copy copyrights <a href="#">Reza</a> - 2019</span>
</nav>
@endif
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap-4.3.1-dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/sweetalert2.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('dist/summernote-bs4.min.js') }}"></script>

@yield('js')