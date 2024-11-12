@extends('layout')

@section('title', 'Posts Page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Post List </h2>
                <a href="{{ route('posts.create') }}" class="btn btn-info my-2">Add Post</a>

                <h3>Active Posts: {{ $inactive_posts }}</h3>
                <h3>Inactive Posts: {{ $active_posts }}</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Comments</th>
                            <th>Thumbnail</th>
                            <th>Created At </th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($postList as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>
                                    @if ($lang == 'en')
                                        {{ $post->title_en }}
                                    @endif
                                    @if ($lang == 'bn')
                                        {{ $post->title_bn }}
                                    @endif
                                    @if ($lang == 'ar')
                                        {{ $post->title_ar }}
                                    @endif
                                </td>
                                <td>
                                    <a href="#">{{ $post->comments()->count() }} Comments</a>
                                </td>
                                <td>
                                    <img src="{{ $post->thumbnail ?? 'https://placehold.co/200x200@2x.png' }}" alt="Thumbnail"
                                        class="img-fluid" width="200px">
                                </td>
                                <td>{{ $post->created_at->toDateString() }}</td>
                                <td>
                                    @auth
                                        @if (auth()->user()->id == $post->user_id)
                                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                        @endif
                                    @endauth
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
