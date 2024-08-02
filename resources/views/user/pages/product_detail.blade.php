
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.css') }}" />
    @include('user.util.usercss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    @include('user.util.header')
    <div class="detail-container">
        <div class="img-deg">
            <img src="/product/{{$data->image}}" alt="">
        </div>
        <div class="detail-deg">
            <div class="favorite-btn" onclick="toggleFavorite()">
                <i class="fas fa-heart" id="favorite-icon"></i>
            </div>
            <p class="title">{{$data->title}}</p>
            <div class="stars">
                <i class="fas fa-star star"></i>
                <i class="fas fa-star star"></i>
                <i class="fas fa-star star"></i>
                <i class="fas fa-star star"></i>
                <i class="fas fa-star star"></i>
            </div>
            <p class="description">{{$data->description}}</p>
            <p class="price">{{$data->price}}</p>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </button>
        </div>
    </div>

    <script>
        function toggleFavorite() {
            const icon = document.getElementById('favorite-icon');
            icon.classList.toggle('fas');
            icon.classList.toggle('far'); 
            if (icon.classList.contains('fas')) {
                alert("Added to favorites!");
            } else {
                alert("Removed from favorites!");
            }
        }
    </script>
</body>

</html>
