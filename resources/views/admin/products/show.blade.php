@extends('layouts.main')
@section('title') Category List | @env('APP_NAME') @endenv @stop()

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">

                        <div class="card mt-4">
                            <div class="card-header  d-flex">
                                <div class="col-10">
                                    {{ $product['name'] ?? '' }}
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="col-2">
                                    <img src={{ url($product['image'] ?? '') }} alt={{ $product['name'] }}
                                        height="100px" width="100" srcset="" />
                                </div>
                                <div class="col-10">
                                    <p>
                                        <span class="mr-1">
                                            <b>
                                                Price:
                                            </b>
                                            ${{ $product['price'] ?? '' }}
                                        </span>
                                    </p>
                                    <p class="mb-2 text-muted text-uppercase small">
                                        <b>
                                            Category:
                                        </b> {{ $product['category']['name'] ?? '' }}
                                    </p>
                                    <p class="pt-1">
                                        <b>
                                            Description:
                                        </b> {{ $product['description'] ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-2"></div>
                </div>
            </div>
        </div>
    </div>

@stop()
