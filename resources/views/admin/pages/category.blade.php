<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.util.admincss')
    <style>
        p {
            font-size: 20px;
            color: #14abbc;
        }

        .div-center {
            text-align: center;
            padding-top: 30px;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
            padding: 40px;
            background-color: #191C24;
            border-radius: 10px;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #555;
            border-color: #14abbc;
            background-color: #191C24;
            border-radius: 4px;
            color: #fff;
        }

        .form-container input[type="text"]:focus {
            border-color: #ea3c42;
            outline: none;
            box-shadow: none;
            background-color: #191C24; /* Arka plan rengini aynı tut */
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #14abbc;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: #ea3c42;
        }
    </style>
</head>

<body>
    <div>
        <div class="container-scroller">
            @include('admin.util.header')
            @include('admin.util.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @if (session()->has('message'))
                        <div class="alert alert-succes">
                            {{session()->get('message')}}
                        </div>
                    @endif
                    <div class="div-center">
                        <div class="form-container">
                            <p>ADD CATEGORY</p>
                            <form action="{{route('add_catogory')}}" method="POST">
                                @csrf
                                <input type="text" name="category_name" placeholder="Write Category Name">
                                <input type="submit" value="ADD">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.util.script')
        </div>
    </div>
</body>

</html>
