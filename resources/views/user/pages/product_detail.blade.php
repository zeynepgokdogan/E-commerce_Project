<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.css') }}" />
    @include('user.util.usercss')
    <style>
        .detail-deg {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            margin: 40px auto;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .img-deg {
            width: 100%;
            height: auto;
            background-size: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        p {
            color: #937CCB;
            text-align: center;
            font-family: 'Righteous', sans-serif;
            font-style: normal;
            font-weight: 700;
            font-size: 30px;
            line-height: normal;

        }

        h2 {
            font-size: 1.5em;
            margin: 0 0 20px 0;
            text-align: center;
        }

        h4 {
            font-size: 1.2em;
            color: black;
            margin: 0;
            padding: 0;
            position: relative;
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('user.util.header')

        <div class="detail-deg">
            <h1>{{$data->title}}</h1>
            <div class="img-deg">
                <img src="/product/{{$data->image}}" alt="">
            </div>
            <h2>{{$data->description}}</h2>
            <h4>{{$data->price}}</h4>
        </div>

    </div>
</body>

</html>