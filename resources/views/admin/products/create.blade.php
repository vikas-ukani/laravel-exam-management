@extends('layouts.main')
@section('title') Create a New Products | @env('APP_NAME') @endenv @stop()

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-6">
                        <h2 class="mt-5 mb-4">Add new Product</h2>
                        <form action={{ route('products.store') }} method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('form.messages')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter Product Name">
                            </div>


                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="image"
                                    accept="image/png,image/jpeg,image/jpg">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Category:</label>
                                <select name="category_id" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example">
                                    <option value=''>Select Product Category</option>

                                    @foreach ($categories as $category)
                                        <option value={{ $category->id }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" name="price" class="form-control" id="price">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="3"
                                    placeholder="Enter description"></textarea>
                            </div>


                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-2"></div>
                </div>
            </div>
        </div>
    </div>

@stop()
