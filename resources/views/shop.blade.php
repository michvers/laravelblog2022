@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="d-flex">
                    <h1>Shop Name</h1>
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-shopping-cart fa-stack-2x" style="color:lightgray"></i>
                        <i class="fa-stack fa-stack-1x text-info text-center">
                            {{Session::has('cart') ? Session::get('cart')->totalQuantity : null}}
                        </i>
                    </span>
                </div>
                <div class="list-group">
                    @foreach($brands as $brand)
                        <a href="{{route('productsPerBrandf', $brand->id)}}"
                           class="list-group-item">{{$brand->name}}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9">
                <section class="py-5">
                    <div class="px-4 px-lg-5 mt-5">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            @foreach($products as $product)
                                <div class="col mb-5">
                                    <div class="card h-100">
                                        <!-- Product image-->
                                        <img class="card-img-top"
                                             src="{{$product->photo ? asset('/img/products/'.$product->photo->file) : 'http://via.placeholder.com/400'}}"
                                             alt="..."/>
                                        <!-- Product details-->
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <!-- Product name-->
                                                <h5 class="fw-bolder">{{$product->name}}</h5>
                                                <!-- Product price-->
                                                €{{$product->price}}
                                            </div>
                                        </div>
                                        <!-- Product actions-->
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex justify-content-between">
                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Detail</a></div>
                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('addToCart', $product->id)}}"><i class="fas fa-cart-plus"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop
