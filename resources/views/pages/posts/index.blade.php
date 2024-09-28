@extends('layout')

@section('title', 'Posts Page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Post List </h2>
            <a href="{{ route('posts.create') }}" class="btn btn-info my-2">Add Post</a>
           <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Created At </th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($postList as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title  }}</td>
                        <td>{{ $post->created_at->toDateString() }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
           </table>
           {{ $postList->links() }}
        </div>
    </div>
</div>
@endsection
