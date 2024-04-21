
  <!-- JS -->
  <script src="{{ asset('public/webasset/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('public/webasset/js/main.js')}}"></script>
    <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

@yield('scripts')
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>