<!DOCTYPE html>
<html>

<head>
   <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.css') }}" />
   @include('user.util.usercss')
</head>

<body>
   <div class="hero_area">
      @include('user.util.header')
      @include('user.util.slider')
      @include('user.util.why')
      @include('user.util.new_arival')
      @include('user.util.product')
      @include('user.util.subscribe')
      @include('user.util.client')
   </div>

   @include('user.util.footer')

   <!-- jQery -->
   <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
   <!-- popper js -->
   <script src="{{ asset('js/popper.min.js') }}"></script>
   <!-- bootstrap js -->
   <script src="{{ asset('js/bootstrap.js') }}"></script>
   <!-- custom js -->
   <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
