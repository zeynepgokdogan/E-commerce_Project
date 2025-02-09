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
        background-color: #191c24;
        border-radius: 10px;
    }

    .form-container input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 2px solid #555;
        border-color: #14abbc;
        background-color: #191c24;
        border-radius: 4px;
        color: #fff;
    }

    .form-container input[type="text"]:focus {
        border-color: #ea3c42;
        outline: none;
        box-shadow: none;
        background-color: #191c24;
    }

    .form-container input:-webkit-autofill,
    .form-container input:-webkit-autofill:hover,
    .form-container input:-webkit-autofill:focus,
    .form-container input:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0 30px #191c24 inset !important;
        -webkit-text-fill-color: #fff !important;
        box-shadow: 0 0 0 30px #191c24 inset !important;
        text-fill-color: #fff !important;
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
        background-color: #107682;
    }

    .form-container select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 2px solid #555;
        border-color: #14abbc;
        background-color: #191c24;
        border-radius: 4px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    .form-container select:focus {
        border-color: #ea3c42;
        outline: none;
        box-shadow: none;
        background-color: #191c24;
    }

    .form-container input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 2px solid #555;
        border-color: #14abbc;
        background-color: #191c24;
        border-radius: 4px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    /* Hide the default file input appearance */
    .form-container input[type="file"]::-webkit-file-upload-button {
        background-color: #14abbc;
        color: #fff;
        border: none;
        padding: 10px;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Style for Firefox */
    .form-container input[type="file"]::-moz-file-upload {
        background-color: #14abbc;
        color: #fff;
        border: none;
        padding: 10px;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .alert {
        background-color: #14abbc;
        color: black;
        padding: 15px;
        border-radius: 5px;
        font-weight: bold;
        margin-bottom: 15px;
        position: relative;
    }

    .alert-close {
        position: absolute;
        top: 15px;
        right: 10px;
        color: black;
        cursor: pointer;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px;
    }

    .data-table tr {
        background-color: #191c24;
    }

    .data-table .table-cell {
        padding: 10px;
        color: #fff;
        border: 1px solid #14abbc;
    }

    .data-table .table-cell:first-child {
        border-right: none;
    }

    .table-header {
        font-weight: bold;
        color: #14abbc;
        padding: 10px;
        border: 1px solid #14abbc;
    }

    .data-table .table-cell:last-child {
        text-align: center;
    }

    .data-table a.btn {
        display: inline-block;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        background-color: #14abbc;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.3s ease;
       
    }

    .data-table a.btn:hover {
        background-color: #107682;
    
    }
    .buton-container{
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin: 10px;
    }


    .current-image {
        text-align: center;
        margin: 20px 0;
    }

    .current-image img {
        max-width: 200px;
        max-height: 200px;
        display: block;
        margin: 0 auto;
    }
</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Prime Trends -Admin</title>
<link rel="stylesheet" href="/admin/vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="/admin/vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" href="/admin/vendors/jvectormap/jquery-jvectormap.css">
<link rel="stylesheet" href="/admin/vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="/admin/vendors/owl-carousel-2/owl.carousel.min.css">
<link rel="stylesheet" href="/admin/vendors/owl-carousel-2/owl.theme.default.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<link rel="shortcut icon" href="/admin/images/favicon.png" />