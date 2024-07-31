<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.util.admincss')
</head>

<body>
    <div>
        <div class="container-scroller">
            @include('admin.util.header')
            @include('admin.util.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @if (session()->has('message'))
                    <div class="alert">
                        <span>{{ session()->get('message') }}</span>
                        <span class="alert-close">&times;</span>
                    </div>
                    @endif
                    <div class="div-center">
                        <div class="form-container">
                            <p>ADD PRODUCT</p>
                            <br>
                            <form action="{{ route('add_product') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label>Product title</label>
                                <input type="text" name="title">

                                <label>Product Description</label>
                                <input type="text" name="description">

                                <label>Product Price </label>
                                <input type="text" name="price">

                                <label>Product Category</label>
                                <select name="category">
                                    <option value="" selected="">Add category here</option>

                                    @foreach ($category as $category)
                                    <option value="shirt">{{$category->category_name}}</option>
                                    @endforeach

                                </select>

                                <label>Discount</label>
                                <input type="text" name="discount">

                                <label>Image</label>
                                <input type="file" name="image">
                                <br>

                                <input type="submit" value="ADD">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.util.script')
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alertCloseBtn = document.querySelector('.alert-close');
            if (alertCloseBtn) {
                alertCloseBtn.addEventListener('click', function () {
                    this.parentElement.style.display = 'none';
                });
            }
        });
    </script>
</body>

</html>