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
      @include('user.pages.products', ['data' => $data, 'page' => 'home'])
      @include('user.util.subscribe')
      @include('user.util.client')
   </div>

   @include('user.util.footer')

</body>

</html>