<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Section</title>
</head>

<body>
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our <span>products</span>
                </h2>
            </div>
            <div class="row">
                @foreach ($products as $myproduct)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="#" class="option1">Add To Cart</a>
                                <a href="#" class="option2">Buy Now</a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="product/{{$myproduct->image}}" alt="{{ $myproduct->title }}">
                        </div>
                        <div class="detail-box">
                            <h5 style="font-size: 19px;">{{$myproduct->title}}</h5>
                        </div>
                        <div class="detail-box">
                            @if ($myproduct->discount_price)
                            <h6 style="color: #14ABBC; font-size: 15px;">{{$myproduct->discount_price}}</h6>
                            <h6 style="color: #EA3C42; font-size: 17px;">{{$myproduct->price}}</h6>
                            @else
                            <h6 style="color: #EA3C42; font-size: 17px;">{{$myproduct->price}}</h6>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagination">
                {!! $products->links() !!}
            </div>
        </div>
    </section>
</body>

</html>
