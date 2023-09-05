@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header">
                All posts

                <a href="{{ route('posts.create') }}" class="btn-sm btn-success">Create</a>
                <a href="" class="btn-sm btn-warning">Trashed</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered border-dark">
                    <tbody>
                        {{-- @foreach ($posts as $post)
                            <tr>
                                <th scope="row">1</th>
                                <td><img src="{{ asset($post->image) }}" alt="" width="100%"></td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ date('d-m-Y', strToTime($post->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn-sm btn-success">Show</a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn-sm btn-primary">Edit</a>
                                    <a href="{{ route('posts.destroy', $post->id) }}" class="btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach --}}
                        <tr>
                            <td>Id</td>
                            <td>{{ $post->id }}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><img src="{{ asset($post->image) }}" alt="" width="150px"></td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>{{ $post->title }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ $post->description }}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{ $post->category_id }}</td>
                        </tr>
                        <tr>
                            <td>Publish Date</td>
                            <td>{{ date('d-m-Y', strToTime($post->created_at)) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
