@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header">
                All posts

                <a href="{{ route('posts.create') }}" class="btn-sm btn-success">Create</a>
                <a href="{{ route('posts.trashed') }}" class="btn-sm btn-warning">Trashed</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Publish Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
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
                                    {{-- <a href="{{ route('posts.destroy', $post->id) }}" class="btn-sm btn-danger">Delete</a> --}}

                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-sm btn-danger">Delete</button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
