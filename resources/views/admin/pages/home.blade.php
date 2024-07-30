<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.util.admincss')
</head>

<body>
  <div>
    @include('admin.util.header')
    @include('admin.util.sidebar')
    <div class="container-scroller">
      @include('admin.util.body')
      @include('admin.util.script')
    </div>
  </div>

</body>

</html>