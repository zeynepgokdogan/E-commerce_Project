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
                            <p>UPDATE PRODUCT</p>
                            <br>
                            <form action="{{ route('update_product', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <!-- Use this if you are using POST for updates, change to 'PUT' if required -->

                                <label for="title">Product Title</label>
                                <input type="text" id="title" name="title" value="{{ old('title', $product->title) }}">

                                <label for="description">Product Description</label>
                                <input type="text" id="description" name="description"
                                    value="{{ old('description', $product->description) }}">

                                <label for="price">Product Price</label>
                                <input type="text" id="price" name="price" value="{{ old('price', $product->price) }}">


                                <label>Product Quantity</label>
                                <input type="text" name="quantity" value="{{ old('quantity',$product->quantity) }}">

                                <label for="category">Product Category</label>
                                <select id="category" name="category">
                                    <option value="" disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category', $product->category_id) ==
                                        $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                    @endforeach
                                </select>

                                <label for="discount">Discount</label>
                                <input type="text" id="discount" name="discount"
                                    value="{{ old('discount', $product->discount_price) }}">

                                <label for="image">Old Image</label>
                                <!-- Display existing image if available -->
                                @if($product->image)
                                <div class="current-image">
                                    <img src="{{ asset('product/' . $product->image) }}" alt="Current Image">
                                </div>
                                @endif
                                <label for="image">New Image</label>
                                <input type="file" id="image" name="image">
                                <br>

                                <input type="submit" value="UPDATE">
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