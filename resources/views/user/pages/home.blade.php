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
   
   <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
   <script src="{{ asset('js/popper.min.js') }}"></script>
   <script src="{{ asset('js/bootstrap.js') }}"></script>
   <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
