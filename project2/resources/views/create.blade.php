@extends('layouts.master')

@section('content')
    <div class="main-content">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Create posts</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="" class="btn-sm btn-success">Back</a>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Category</label>
                        <select id="" class="form-control" name="category_id">
                            <option value="" disabled selected>Select</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea id="" cols="30" rows="10" class="form-control" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary mt-3">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
