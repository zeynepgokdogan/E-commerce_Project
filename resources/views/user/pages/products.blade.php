<!DOCTYPE html>
<html>

<head>
   <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.css') }}" />
   @include('user.util.usercss')
</head>

<body>
   <div class="hero_area">
      @include('user.util.header')

      <!-- Alert container, placed directly in the body -->
      <div id="alert" class="alert" style="display: none;"></div>

      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>Products</span>
               </h2>
            </div>
            <div class="row">
               @foreach ($data as $myproduct)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <form action="{{ route('add_cart', ['id' => $myproduct->id]) }}" method="POST"
                              id="add-to-cart-form-{{ $myproduct->id }}">
                              @csrf
                              <button type="submit" class="option1">ADD TO CART</button>
                           </form>
                           <a href="{{ route('user.detailPage', ['id' => $myproduct->id]) }}" class="option2">View
                              Details</a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="/product/{{$myproduct->image}}" alt="{{ $myproduct->title }}">
                     </div>
                     <div class="detail-box">
                        <h5 style="font-size: 19px;">{{$myproduct->title}}</h5>
                     </div>
                     <div class="detail-box">
                        @if ($myproduct->discount_price)
                        <h6 style="color: #14ABBC; font-size: 15px;">{{ number_format($myproduct->discount_price, 0, ',', '.') }}%</h6>
                        <h6 style="color: #EA3C42; font-size: 17px;">{{ number_format($myproduct->price, 0, ',', '.') }} €</h6>
                        @else
                        <h6 style="color: #EA3C42; font-size: 17px;">{{ number_format($myproduct->price, 0, ',', '.') }} €</h6>
                        @endif
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            @if (isset($page) && $page == 'home')
            <div class="pagination">
               {!! $data->links() !!}
            </div>
            @endif
         </div>
      </section>

      @include('user.util.footer')

   </div>

   <script>
      document.addEventListener('DOMContentLoaded', function() {
         console.log('JavaScript loaded'); // Check if JavaScript is loaded

         document.querySelectorAll('form[id^="add-to-cart-form"]').forEach(form => {
            form.addEventListener('submit', function(event) {
               event.preventDefault(); // Prevent default form submission

               console.log('Form submitted'); // Check if the form submission is detected

               const formData = new FormData(this);
               const url = this.action;

               fetch(url, {
                  method: 'POST',
                  body: formData,
                  headers: {
                     'X-Requested-With': 'XMLHttpRequest',
                     'X-CSRF-TOKEN': formData.get('_token')
                  }
               })
               .then(response => response.json())
               .then(data => {
                  console.log(data); // Log the response data

                  const alertDiv = document.getElementById('alert');
                  if (data.success) {
                     alertDiv.className = 'alert success'; // Update class for success
                     alertDiv.textContent = data.success;
                  } else if (data.error) {
                     alertDiv.className = 'alert error'; // Update class for error
                     alertDiv.textContent = data.error;
                  }
                  alertDiv.style.display = 'block'; // Show the alert div
                  setTimeout(() => alertDiv.style.display = 'none', 5000); // Hide after 5 seconds
               })
               .catch(error => {
                  console.error('Error:', error);
               });
            });
         });
      });
   </script>

</body>

</html>
