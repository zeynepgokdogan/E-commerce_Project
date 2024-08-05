<!DOCTYPE html>
<html>

<head>
    <title>PrimeTrends -Product Detail Page</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.css') }}" />
    @include('user.util.usercss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    @include('user.util.header')

    <div id="alert" class="alert"></div>

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
            <p class="price">{{$data->price}} €</p>
            <form action="{{ route('add_cart', $data->id) }}" method="POST" id="add-to-cart-form">
                @csrf
                <button type="submit" class="add-to-cart">
                    <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
            </form>
        </div>
    </div>

    <script>
        function showAlert(message, type) {
            const alertElement = document.getElementById('alert');
            alertElement.textContent = message;
            alertElement.className = 'alert ' + type; // e.g., 'alert success' or 'alert error'
            alertElement.style.display = 'block';
            setTimeout(() => {
                alertElement.style.display = 'none';
            }, 3000); // Hide after 3 seconds
        }

        // Handle form submission
        document.getElementById('add-to-cart-form').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission

            // Use Fetch API to submit the form and handle the response
            fetch(this.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: new URLSearchParams(new FormData(this)).toString()
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAlert(data.success, 'success');
                } else if (data.error) {
                    showAlert(data.error, 'error');
                }
            })
            .catch(error => {
                showAlert('An error occurred.', 'error');
            });
        });

        function toggleFavorite() {
            const icon = document.getElementById('favorite-icon');
            icon.classList.toggle('fas');
            icon.classList.toggle('far'); 
            if (icon.classList.contains('fas')) {
                // Handle favorite state
            } else {
                // Handle unfavorite state
            }
        }
    </script>
</body>

</html>