@extends('layout')

@section('title', 'Comments Page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Comment List </h2>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Comment</th>
                            <th>Created At </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>
                                    {{ $comment->user->name }}
                                </td>
                                <td>
                                    {{ $comment->comment }}
                                </td>

                                <td>{{ $comment->created_at->toDateString() }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
