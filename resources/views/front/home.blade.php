@extends('front.layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <!-- Banner Section -->
        <div class="banner relative">
            <div class="text-center relative z-10">
                <h1 class="text-5xl">Welcome to the Book Review System</h1>
                <p class="text-lg my-4">Discover and share reviews on your favorite books.</p>
                <p><a href="#" class="hover:bg-gray-100">Learn More</a></p>
            </div>
        </div>

        <!-- Book List Section -->
        <div class="book-list mt-8">
            <h2>Featured Books</h2>
            <div class="flex-container">
                @foreach($books as $book)
                    <div class="book-card">
                        @if ($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}">
                        @else
                            <img src="{{ asset('images/default_cover.png') }}" alt="Default Cover">
                        @endif
                        <div class="card-body">
                            <h5>{{ $book->title }}</h5>
                            <p>Author: {{ $book->author }}</p>
                            <p>Average Rating: {{ number_format($book->averageRating(), 1) }}</p>
                            <a href="{{ route('books.show', $book->id) }}">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
