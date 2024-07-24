<!-- resources/views/admin/books/show.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Book Details') }}</div>

                <div class="card-body">
                    @if ($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" class="img-fluid mb-3" alt="{{ $book->title }}">
                    @else
                        <img src="{{ asset('images/default_cover.jpg') }}" class="img-fluid mb-3" alt="Default Cover">
                    @endif
                    <h5>Title: {{ $book->title }}</h5>
                    <p>Author: {{ $book->author }}</p>
                    <p>Description: {{ $book->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
