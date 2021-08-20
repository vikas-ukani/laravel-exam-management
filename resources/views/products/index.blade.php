@extends('layouts.main')
@section('title') Products List | @env('APP_NAME') @endenv @stop()

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        @if (count($products) == 0)
                            <div class="m-5 p-5 text-center bg-light rounded text-bold ">
                                <h3>No Product found!.</h3>
                            </div>
                        @endif
                        @foreach ($products->toArray() as $product)
                            <div class="card mt-4">
                                <div class="card-header ">
                                    <div class="col-10">
                                        {{ $product['name'] ?? '' }}
                                    </div>
                                </div>
                                <div class="card-body row">
                                    <div class="col-2">
                                        <img src={{ url($product['image'] ?? '') }} alt={{ $product['name'] }}
                                            height="100px" width="100" srcset="">
                                    </div>
                                    <div class="col-10">
                                        <p>
                                            <span class="mr-1">
                                                <b>
                                                    $ {{ $product['price'] ?? '' }}
                                                </b>
                                            </span>
                                        </p>
                                        <p class="mb-2 text-muted text-uppercase small">
                                            {{ $product['category']['name'] ?? '' }}
                                        </p>
                                        <p class="pt-1">
                                            {{ $product['description'] ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-2"></div>
                </div>
            </div>
        </div>
    </div>

@stop()
