<style>
    body {
        font-family: Figtree, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    /* product page */

    .product_section {
        padding: 50px 0;
    }

    .heading_container {
        text-align: center;
        margin-bottom: 50px;
    }

    .heading_container h2 {
        font-size: 36px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .heading_container h2 span {
        color: #f39c12;
    }

    .box {
        border: 1px solid #ddd;
        padding: 20px;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }

    .option_container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease-in-out;
    }

    .box:hover .option_container {
        opacity: 1;
    }

    .options {
        text-align: center;
    }

    .options a {
        display: block;
        margin: 10px 0;
        padding: 10px 20px;
        background: #fff;
        color: #333;
        text-transform: uppercase;
        text-decoration: none;
    }

    .img-box {
        text-align: center;
        margin-bottom: 20px;
    }

    .img-box img {
        max-width: 100%;
        height: auto;
    }

    .detail-box {
        text-align: center;
    }

    .detail-box h5 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .detail-box h6 {
        color: red;
        font-size: 20px;
    }

    .detail-box h6.discount-price {
        text-decoration: line-through;
        color: red;
    }

    h5 {
        color: black;
        font-size: 19px;
        font-weight: 700;
        text-shadow: 0.5px 0.5px 0.5px #000;
    }

    h6 {
        color: #EA3C42;
        font-size: 17px;
        font-weight: 700;
        text-shadow: 0.5px 0.5px 0.5px #000;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a {
        color: #14abbc;
        /* Default color for pagination numbers */
        padding: 8px 16px;
        text-decoration: none;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin: 0 4px;
    }

    .pagination a:hover {
        background-color: #f1f1f1;
    }

    .pagination .active a {
        color: red;
        /* Text color on the active page */
        background-color: #EA3C42;
        /* Background color for the active page */
        border: 1px solid #EA3C42;
    }

    .pagination .disabled {
        color: #ea3c42;
        /* Color for disabled pagination links */
        border: 1px solid #ddd;
    }

    /* product page */

    .detail-container {
        display: flex;
        flex-direction: row;
        background-color: #f7f8f9;
        border-radius: 15px;
        padding: 20px;
        margin: 40px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        justify-content: space-evenly;
    }

    .detail-deg {
        background-color: #e5e8ea;
        border-radius: 15px;
        padding: 30px;
        max-width: 600px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        position: relative;
        text-align: left;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
    }

    .detail-deg p {
        margin: 0;
        padding: 10px 0;
        border-bottom: 1px solid #ccc;
    }

    .detail-deg p:last-of-type {
        border-bottom: none;
    }

    .img-deg img {
        margin-left: 30px;
        width: 450px;
        height: 650px;
        border-radius: 10px;
    }

    .title {
        font-size: 25px;
        font-weight: bold;
        color: #349faa;
        position: relative;
        padding-right: 40px;
    }

    .description {
        font-size: 20px;
        margin: 0 0 20px 0;
    }

    .price {
        font-size: 22px;
        color: red;
        margin: 0;
        padding: 0;
        margin-top: 20px;
    }

    .stars {
        display: flex;
        gap: 5px;
        margin: 10px 0;
    }

    .star {
        font-size: 20px;
        color: gold;
    }

    .favorite-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 30px;
        color: red;
        cursor: pointer;
    }

    .add-to-cart {
        margin-top: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        background-color: #349faa;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px;
        font-size: 18px;
        cursor: pointer;
    }

    .add-to-cart i {
        margin-right: 8px;
        font-size: 20px;
    }
</style>

<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<!-- Site Metas -->
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="" />
<link rel="shortcut icon" href="/user/images/favicon.png" type="image/x-icon">
<title></title>
<!-- Bootstrap core CSS -->
<link rel="stylesheet" type="text/css" href="/user/css/bootstrap.css" />
<!-- Font Awesome style -->
<link href="/user/css/font-awesome.min.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="/user/css/style.css" rel="stylesheet" />
<!-- Responsive style -->
<link href="/user/css/responsive.css" rel="stylesheet" />


<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>