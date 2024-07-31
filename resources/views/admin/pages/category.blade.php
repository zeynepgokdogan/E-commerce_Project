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
                            <p>ADD CATEGORY</p>
                            <form action="{{ route('add_catogory') }}" method="POST">
                                @csrf
                                <input type="text" name="category_name" placeholder="Write Category Name">
                                <input type="submit" value="ADD">
                            </form>
                        </div>
                        <table class="data-table">
                            <tr>
                                <td class="table-header">Category Name</td>
                                <td class="table-header">Action</td>
                            </tr>
                            @foreach ($data as $mydata)
                            <tr>
                                <td class="table-cell">{{$mydata->category_name}}</td>
                                <td class="table-cell">
                                    <a class="btn btn-danger"
                                        href="{{ route('delete_category', $mydata->id) }}"
                                        onclick="return confirm('Are you sure delete this category?')">Delete</a>
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