<!DOCTYPE html>
<html>

<head>
   <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.css') }}" />
   @include('user.usercss')
</head>

<body>
   <div class="hero_area">
      @include('user.header')
      @include('user.slider')
      @include('user.why')
      @include('user.new_arival')
      @include('user.product')
      @include('user.subscribe')
      @include('user.client')
   </div>

   @include('user.footer')

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
