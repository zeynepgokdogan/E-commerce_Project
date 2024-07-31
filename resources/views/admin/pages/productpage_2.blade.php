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

                        <table class="data-table">
                            <tr>
                                <td class="table-header">Category</td>
                                <td class="table-header">Title</td>
                                <td class="table-header">Description</td>
                                <td class="table-header">Price</td>
                                <td class="table-header">Discount</td>
                                <td class="table-header">Image</td>
                                <td class="table-header">Action</td>
                            </tr>
                            @foreach ($product as $myproduct)
                            <tr>
                                <td class="table-cell">{{$myproduct->category}}</td>
                                <td class="table-cell">{{$myproduct->title}}</td>
                                <td class="table-cell">{{$myproduct->description}}</td>
                                <td class="table-cell">{{$myproduct->price}}</td>
                                <td class="table-cell">{{$myproduct->discount_price}}</td>
                                <td class="table-cell"><img src="/product/{{$myproduct->image}}" alt=""></td>
                                <td class="table-cell">
                                    <div class="buton-container">
                                        <a class="btn btn-danger"
                                            style="background-color:#ea3c42; color: white; text-decoration: none; padding: 10px 20px; border-radius: 5px;"
                                            href="{{ route('delete_product', $myproduct->id) }}"
                                            onclick="return confirm('Are you sure delete this product?')"
                                            onmouseover="this.style.backgroundColor='#c62828';"
                                            onmouseout="this.style.backgroundColor='#ea3c42';">Delete</a>
                                        <a class="btn"
                                            href="{{ route('admin.view_product3', $myproduct->id) }}">Update</a>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </table>
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