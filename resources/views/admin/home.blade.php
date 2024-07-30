<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.admincss')
</head>

<body>
  <div>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="container-scroller">
      @include('admin.body')
      @include('admin.script')
    </div>
  </div>

</body>

</html>