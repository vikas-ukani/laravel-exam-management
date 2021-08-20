@extends('layouts.main')
@section('title') Categories Listing | @env('APP_NAME') @endenv @stop()

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        @if (count($categories) == 0)
                            <div class="m-5 p-5 text-center bg-light rounded text-bold ">
                                <h3>No Categories found!.</h3>
                            </div>
                        @endif

                        @foreach ($categories->toArray() as $category)
                            <div class="card mt-4">
                                <div class="card-header ">
                                    <div class="col-10">
                                        {{ $category['name'] ?? '' }}
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
