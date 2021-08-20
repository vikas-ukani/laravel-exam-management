@extends('layouts.main')
@section('title') Create an New Category | @env('APP_NAME') @endenv @stop()

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-6">
                        <h2 class="mt-5 mb-4">Add new Product</h2>
                        <form action={{ route('category.store') }} method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('form.messages')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter Category Name">
                            </div>

                            <div class="mb-3">
                                <label for="is_active_true" class="form-label">
                                    <input type="radio" name="is_active" id="is_active_true" value=0 checked="true" />
                                    Active
                                </label>

                                <label for="is_active_false" class="form-label">
                                    <input type="radio" name="is_active" id="is_active_false" value=1 /> Deactive
                                </label>

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
