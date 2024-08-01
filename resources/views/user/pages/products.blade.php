<!DOCTYPE html>
<html>

<head>
   <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.css') }}" />
   @include('user.util.usercss')
</head>

<body>
   <div class="hero_area">
      @include('user.util.header')

      @include('user.util.product')

   </div>

   @include('user.util.footer')

</body>

</html>
