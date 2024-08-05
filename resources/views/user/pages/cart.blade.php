<!DOCTYPE html>
<html>

<head>
    <title>PrimeTrends -Cart</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.css') }}" />
    @include('user.util.usercss')
</head>

<body>
    <div class="hero_area">
        @include('user.util.header')
        <div id="alert" class="alert" style="display: none;"></div>

        <section class="product_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        My <span>Cart</span>
                    </h2>
                </div>
                <div class="cart_table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                            <?php $totalprice=0; ?>
                            @foreach($carts as $cart)
                            <tr data-price="{{ $cart->price }}">
                                <td>
                                    <div class="product_info">
                                        <img src="/product/{{ $cart->image }}" alt="Product Image" />
                                        <span style="font-weight: 700"> {{ $cart->title }}</span>
                                    </div>
                                </td>
                                <td>${{ number_format($cart->price, 2) }}</td>
                                <td>
                                    <div class="quantity_controls">
                                        <div class="quantity_button" data-action="decrease">-</div>
                                        <div class="quantity_display">{{ $cart->quantity }}</div>
                                        <div class="quantity_button" data-action="increase">+</div>
                                    </div>
                                </td>
                                <td class="total_price">${{ number_format($cart->price * $cart->quantity, 2) }}</td>
                                <td>
                                    <a class="btn btn-danger" href="{{ route('remove_cart', $cart->id) }}">Remove</a>
                                </td>
                            </tr>
                            <?php $totalprice += $cart->price * $cart->quantity; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="cart_summary">
                    <p><span class="total_label">Total:</span> <span id="total-price" class="total_price">${{
                            number_format($totalprice, 2) }}</span></p>
                    <div class="button-container">
                        <button class="checkout_button"
                            onclick="window.location.href='{{ route('cash_on_delivery') }}'">Cash On Delivery</button>
                        <button class="checkout_button"
                            onclick="window.location.href='{{ route('pay_using_card', ['totalprice' => $totalprice]) }}'">Pay
                            Using Card</button>

                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('user.util.footer')
    <script>
        function updateTotalPrice() {
            let totalPrice = 0;
            document.querySelectorAll('#cart-items tr').forEach(row => {
                const price = parseFloat(row.getAttribute('data-price'));
                const quantity = parseInt(row.querySelector('.quantity_display').textContent);
                totalPrice += price * quantity;
                row.querySelector('.total_price').textContent = `$${(price * quantity).toFixed(2)}`;
            });
            document.getElementById('total-price').textContent = `$${totalPrice.toFixed(2)}`;
        }
    
        document.querySelectorAll('.quantity_button').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const quantityDisplay = row.querySelector('.quantity_display');
                let quantity = parseInt(quantityDisplay.textContent);
                const action = this.getAttribute('data-action');
                
                if (action === 'increase') {
                    quantity++;
                } else if (action === 'decrease' && quantity > 1) {
                    quantity--;
                }
                
                quantityDisplay.textContent = quantity;
                updateTotalPrice();
            });
        });
        updateTotalPrice();
        
        @if (session('error'))
            document.addEventListener('DOMContentLoaded', function() {
                const alertBox = document.getElementById('alert');
                alertBox.textContent = '{{ session('error') }}';
                alertBox.classList.add('error');
                alertBox.style.display = 'block';

                setTimeout(function() {
                    alertBox.style.display = 'none';
                }, 3000);
            });
        @endif

        @if (session('success'))
            document.addEventListener('DOMContentLoaded', function() {
                const alertBox = document.getElementById('alert');
                alertBox.textContent = '{{ session('success') }}';
                alertBox.classList.add('success');
                alertBox.style.display = 'block';

                setTimeout(function() {
                    alertBox.style.display = 'none';
                }, 2000);
            });
        @endif
    </script>

</body>

</html>