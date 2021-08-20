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
                            @if (auth()->user()->user_type === 'ADMIN')
                                <div class=" my-2">
                                    <a href={{ route('category.create') }} class="btn btn-success ">
                                        Add New Category
                                    </a>
                                </div>
                            @endif
                        @endauth

                        @if (count($categories) == 0)
                            <div class="m-5 p-5 text-center bg-light rounded text-bold ">
                                <h3>No Categories found!.</h3>
                            </div>
                        @endif
                        @include('form.messages')

                        @foreach ($categories->toArray() as $category)
                            <div class="card mt-4">
                                <div class="card-header d-flex">
                                    <div class="col-10">
                                        {{ $category['name'] ?? '' }}
                                        <span
                                            class=" badge badge-primary badge-pill {{ $category['is_active'] == true ? 'bg-success' : 'bg-danger' }}">
                                            {{ $category['is_active'] == true ? 'Active' : 'Inactive' }}
                                        </span>

                                    </div>

                                    @auth
                                        @if (auth()->user()->user_type === 'ADMIN')
                                            <span class="col-2 align-content-lg-around">
                                                <form method="POST" action={{ url('admin/category/' . $category['id']) }}>
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this record?')">
                                                        <i data-feather="delete"></i>
                                                        DELETE
                                                    </button>
                                                </form>
                                            </span>
                                        @endif
                                    @endauth
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
