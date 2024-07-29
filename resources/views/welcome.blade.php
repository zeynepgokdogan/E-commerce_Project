<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PrimeTrends</title>
    <link rel="icon" href="/user/images/logo.png" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f7fafc;
        }

        .div-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-image: url('/images/background.png');
            background-size: cover;
            background-position: center;
            width: 100%;
            padding: 20px;
            border-radius: 10px;
        }

        .div-1,
        .div-2 {
            width: 100%;
            text-align: center;
            padding: 30px;
        }

        .div-1 img,
        .div-2 img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .auth-links {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .auth-links a {
            display: block;
            width: 200px;
            padding: 15px 0;
            margin: 10px 0;
            text-align: center;
            font-size: 16px;
            font-weight: 600;
            color: #4a5568;
            text-decoration: none;
            background: #14abbc;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .auth-links a:hover {
            background-color: #ea3c42;
        }

        .auth-links a:focus {
            outline: none;
            background-color: #cbd5e0;
        }

        @media (min-width: 768px) {
            .div-container {
                flex-direction: row;
                justify-content: space-around;
                padding: 40px;
            }

            .div-1,
            .div-2 {
                width: 45%;
            }
        }
    </style>
</head>

<body>
    @if (Route::has('login'))
    @auth
    <script>
        window.location.href = "{{ url('/redirect') }}";
    </script>
    @else

    <div class="div-container">
        <div class="div-1">
            <a class="navbar-brand" href="index.html"><img src="/images/welcome_image.png" alt="Welcome Image" /></a>
        </div>
        <div class="div-2">
            <div>
                <a class="navbar-brand" href="index.html"><img src="/user/images/logo.png" alt="Logo" /></a>
            </div>
            <div class="auth-links">
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
            </div>
        </div>
    </div>

    @endauth
    @endif
</body>

</html>
