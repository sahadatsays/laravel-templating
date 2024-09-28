@extends('layout')

@section('title', 'Posts Page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Post Create </h2>
                <form action="{{ route('posts.store') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">New Post</h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="title">Post Title</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Write post title">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="title">Post Slug</label>
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="Write post slug">
                                        @error('slug')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="content">Content</label>
                                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10" placeholder="Write post content"></textarea>
                                    @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit">Save Post </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
