@extends('layouts.app')

@section('content')

<div class="card bg-dark m-2 mt-0">
    <div class="card-body">
        <div class="form-group">
            <form method="POST" action="{{ route('files.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="text-white">File name:</label>
                    <input type="text" name="name" class="form-control" placeholder="File name" required>
                </div>
                <hr class="text-white">
                <div class="form-group">
                    <label for="description" class="text-white">File description (optional):</label>
                    <textarea name="description" class="form-control" rows="2"></textarea>
                </div>
                <hr class="text-white">
                <div class="form-group">
                    <label for="content" class="text-white">File content:</label>
                    <textarea name="content" class="form-control" rows="10" required></textarea>
                </div>
                <hr class="text-white">
                <div class="card">
                    <button type="submit" class="btn btn-dark">Save</button>
                </div>
            </form>            
        </div>
    </div>
</div>

@endsection