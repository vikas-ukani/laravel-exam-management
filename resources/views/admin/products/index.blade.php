@extends('layouts.main')
@section('title') Category List | @env('APP_NAME') @endenv @stop()

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        @auth
                            {{-- {{dd(auth()->user()->user_type)}} --}}
                            @if (auth()->user()->user_type === 'ADMIN')
                                <div class=" my-2">
                                    <a href={{ route('products.create') }} class="btn btn-success ">
                                        Add New Product
                                    </a>
                                </div>
                            @endif
                        @endauth

                        @if (count($products) == 0)
                            <div class="m-5 p-5 text-center bg-light rounded text-bold ">
                                <h3>No Product found!.</h3>
                            </div>
                        @endif

                        @foreach ($products->toArray() as $product)
                            <div class="card mt-4">
                                <div class="card-header  d-flex">
                                    <div class="col-10">
                                        <a href={{ route('products.show', ['product'=> $product['id']]) }}>
                                            {{ $product['name'] ?? '' }}
                                        </a>
                                    </div>
                                    @auth
                                        @if (auth()->user()->user_type === 'ADMIN')
                                            <span class="col-2 align-content-lg-around">
                                                <form method="POST" action={{ url('admin/products/' . $product['id']) }}>
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i data-feather="delete"></i>
                                                        DELETE
                                                    </button>
                                                </form>
                                            </span>
                                        @endif
                                    @endauth

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
                        @endforeach
                    </div>

                    <div class="col-2"></div>
                </div>
            </div>
        </div>
    </div>

@stop()
