@extends('layouts.app')

@section('content')

<div class="card bg-dark m-2 mt-0">
    <div class="card-body">
        <div class="card">
            <a href="{{ route('files.create') }}" class="btn btn-dark">Create File</a>
        </div>
        <hr class="text-white">
        
        @if ($user->files()->count() > 0)
            @foreach ($user->files as $file)
            <div class="card mt-1 mb-3 border-3">
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
                            <div class="card">
                                <a href="{{ route('files.show', $file) }}" class="btn btn-dark">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <div class="card bg-dark mt-4 text-center">
            <p class="m-2 text-white"><i>You do not have any file yet</i></p>
        </div>
        @endif
    </div>
</div>


@endsection