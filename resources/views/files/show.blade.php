@extends('layouts.app')

@section('content')

<div class="card bg-dark m-2 mt-0">
    <div class="card-body">
        <div class="card mt-1 mb-3">
            <div class="card text-center text-white bg-dark">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <div class="card m-1 mb-0">
                                <a class="nav-link bg-dark disabled text-white">Views: {{ $file->views }}</a>
                            </div>
                        </li>       
                        <li class="nav-item">
                            <div class="card m-1 mb-0">
                                <a class="nav-link bg-dark disabled text-white">Likes: {{ $file->likes }}</a>
                            </div>
                        </li>
                        @if ($file->user->id == Auth::user()->id)
                        <li class="nav-item">
                            <div class="card m-1 mb-0">
                                <a class="btn btn-warning" href="{{ route('files.edit', $file) }}">Edit</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="card m-1 mb-0">
                                <form method="POST" action="{{ route('files.destroy', $file) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </li>
                        @endif
                    </ul>
                    <hr class="text-white">
                    <div class="card-body bg-dark text-white">
                        <h5 class="card-title">{{ $file->name }}</h5>
                        <p class="card-text">{{ $file->description }}</p>
                        <hr>
                        <div class="form-group">
                            <textarea id="content" class="form-control" rows="10" readonly>{{ $file->content }}</textarea>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', (event) => {
                                const textarea = document.getElementById('content');
                                textarea.style.height = 'auto';
                                textarea.style.height = textarea.scrollHeight + 'px';
                            });
                        </script>
                        <style>
                            textarea[readonly] {
                                background-color: #f8f9fa; 
                                border: none;
                                resize: none;
                                overflow: hidden;
                                height: auto;
                                min-height: 1em;
                                max-height: none;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($file->comments as $comment)
        <div class="container text-body">
            <div class="row d-flex justify-content-center">
                <div class="d-flex flex-start mb-4">
                    <img class="rounded-circle shadow-1-strong me-3 bg-white" src="{{ asset('storage/' . $comment->user->image) }}" alt="avatar" width="65" height="65"/>
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <h5>{{ $comment->user->name }}</h5>
                            <p class="small">{{ $comment->created_at }}</p>
                            <p>{{ $comment->text }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('comments.like', $comment) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger">Likes: {{ $comment->likes }}</button>
                                    </form>
                                </div>                                    
                                <a href="#!" class="btn btn-dark"> Reply</a>
                            </div>
                            <hr>
                            @foreach ($comment->replies as $reply)
                            <div class="container text-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="d-flex flex-start mb-4">
                                        <img class="rounded-circle shadow-1-strong me-3 bg-white" src="{{ asset('storage/' . $reply->user->image) }}" alt="avatar" width="65" height="65"/>
                                        <div class="card w-100 bg-dark text-white">
                                            <div class="card-body p-4">
                                                <h5>{{ $reply->user->name }}</h5>
                                                <p class="small">{{ $reply->created_at }}</p>
                                                <p>{{ $comment->text }}</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <form action="{{ route('comments.like', $comment) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-danger">Likes: {{ $comment->likes }}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection