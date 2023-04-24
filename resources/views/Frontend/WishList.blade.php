@extends('Frontend.Main.Master')

<title>Wishlist</title>

@section('FrontAdmin')
    <style>
        .cart-wrap {
            padding: 40px 0;
            font-family: 'Open Sans', sans-serif;
        }

        .main-heading {
            font-size: 25px;
            margin-bottom: 20px;
        }

        .table-wishlist table {
            width: 100%;
        }

        .table-wishlist thead {
            border-bottom: 1px solid #e5e5e5;
            margin-bottom: 5px;
        }

        .table-wishlist thead tr th {
            padding: 10px 15px 15px;
            color: #484848;
            background-color: #EDF1FF;
            font-size: 15px;
            font-weight: dark;

        }

        .table-wishlist tr td {
            padding: 25px 0;
            vertical-align: middle;
        }

        .table-wishlist tr td .img-product {
            width: 72px;
            float: left;
            margin-left: 8px;
            margin-right: 31px;
            line-height: 63px;
        }

        .table-wishlist tr td .img-product img {
            width: 100%;
        }

        .table-wishlist tr td .name-product {
            font-size: 16px;
            color: #484848;
            padding-top: 8px;
            line-height: 24px;
            width: 50%;
        }

        .table-wishlist tr td.price {
            font-weight: 600;
        }

        .table-wishlist tr td .quanlity {
            position: relative;
        }

        .total {
            font-size: 24px;
            font-weight: 600;
            color: #8660e9;
        }

        .display-flex {
            display: flex;
        }

        .align-center {
            align-items: center;
        }

        .round-black-btn {
            border-radius: 25px;
            background: #D19C97;
            color: #000000;
            padding: 5px 20px;
            display: inline-block;
            border: solid 2px #D19C97;
            transition: all 0.5s ease-in-out 0s;
            cursor: pointer;
            font-size: 15px;
        }

        .round-black-btn:hover,
        .round-black-btn:focus {
            /* background: transparent; */
            color: #ffffff;
            text-decoration: none;
        }

        .mb-10 {
            margin-bottom: 10px !important;
        }

        .mt-30 {
            margin-top: 30px !important;
        }

        .d-block {
            display: block;
        }

        .custom-form label {
            font-size: 14px;
            line-height: 14px;
        }

        .pretty.p-default {
            margin-bottom: 15px;
        }

        .pretty input:checked~.state.p-primary-o label:before,
        .pretty.p-toggle .state.p-primary-o label:before {
            border-color: #8660e9;
        }

        .pretty.p-default:not(.p-fill) input:checked~.state.p-primary-o label:after {
            background-color: #8660e9 !important;
        }

        .main-heading.border-b {
            border-bottom: solid 1px #ededed;
            padding-bottom: 15px;
            margin-bottom: 20px !important;
        }

        .custom-form .pretty .state label {
            padding-left: 6px;
        }

        .custom-form .pretty .state label:before {
            top: 1px;
        }

        .custom-form .pretty .state label:after {
            top: 1px;
        }

        .custom-form .form-control {
            font-size: 14px;
            height: 38px;
        }

        .custom-form .form-control:focus {
            box-shadow: none;
        }

        .custom-form textarea.form-control {
            height: auto;
        }

        .mt-40 {
            margin-top: 40px !important;
        }

        .in-stock-box {
            background: #ff0000;
            font-size: 12px;
            text-align: center;
            border-radius: 25px;
            padding: 4px 15px;
            display: inline-block;
            color: #fff;
        }

        .trash-icon {
            font-size: 20px;
            color: #212529;
        }
    </style>


    <div class="cart-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-heading mb-10">My wishlist</div>
                    <div class="table-wishlist">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="30%">Product Name</th>
                                    {{-- <th width="15%">Product Id</th> --}}
                                    <th width="15%">Product Price</th>
                                    <th width="15%">Stock Status</th>
                                    <th width="20%">Cart</th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td width="45%">
                                            <div class="display-flex align-center">
                                                <div class="img-product">
                                                    <img src="  {{ !empty($data->wishlist->productimage) ? url('ProductImages/' . $data->wishlist->productimage) : url('ProductImages/default.jfif') }}"
                                                        alt="" class="mCS_img_loaded">

                                                </div>
                                                <div class="name-product">
                                                    {{ $data->wishlist->productname }}
                                                </div>
                                            </div>
                                        </td>
                                        {{-- <td width="15%">{{ $data->product_id }}</td> --}}
                                        <td width="15%" class="price">₹{{ $data->wishlist->selling }}</td>
                                        @if ($data->wishlist->stock != 1)
                                            <td width="15%"><span class="in-stock-box">Out Of Stock</span></td>
                                        @else
                                            <td width="15%"><span class="in-stock-box">In Stock</span></td>
                                        @endif
                                        <td width="15%"><a href="{{route('Product-Detail',$data->wishlist->id)}}" class="round-black-btn small-btn"
                                                value="{{ $data->wishlist->stock != 1 ? 'disabled' : '' }}">Details</a>
                                        </td>
                                        <td width="10%" class="text-center"><a href="{{route('deletewishlist',$data->id)}}" class="trash-icon"><i
                                                    class="far fa-trash-alt"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> Colorful
                                Stylish Shirt</td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center"
                                        value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary"><i
                                        class="fa fa-times"></i></button></td>
                        </tr>
                        <tr>
                            <td class="align-middle"><img src="img/product-2.jpg" alt="" style="width: 50px;">
                                Colorful Stylish Shirt</td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center"
                                        value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary"><i
                                        class="fa fa-times"></i></button></td>
                        </tr>
                        <tr>
                            <td class="align-middle"><img src="img/product-3.jpg" alt="" style="width: 50px;">
                                Colorful Stylish Shirt</td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center"
                                        value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary"><i
                                        class="fa fa-times"></i></button></td>
                        </tr>
                        <tr>
                            <td class="align-middle"><img src="img/product-4.jpg" alt="" style="width: 50px;">
                                Colorful Stylish Shirt</td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center"
                                        value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary"><i
                                        class="fa fa-times"></i></button></td>
                        </tr>
                        <tr>
                            <td class="align-middle"><img src="img/product-5.jpg" alt="" style="width: 50px;">
                                Colorful Stylish Shirt</td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center"
                                        value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary"><i
                                        class="fa fa-times"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
@endsection
