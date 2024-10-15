@extends('layout')

@section('title', 'Posts Page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Post Create </h2>
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">New Post</h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="title">Post Title (English)</label>
                                        <input type="text" name="title[en]"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Write post title">
                                        @if ($errors->has('title.en'))
                                        <span class="text-danger">{{ $errors->first('title.en') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="title">Post Title (Arabic)</label>
                                        <input type="text" name="title[ar]"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Write post title">
                                        @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="title">Post Title (Bangla)</label>
                                        <input type="text" name="title[bn]"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Write post title">
                                        @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="title">Post Slug</label>
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                            name="slug" placeholder="Write post slug">
                                        @error('slug')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label for="content">Content</label>
                                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10"
                                        placeholder="Write post content">{{ old('content') }}</textarea>
                                    @error('content')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="thumbnail">Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control">
                                    @error('thumbnail')
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
