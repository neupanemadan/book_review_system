<!-- resources/views/front/books/show.blade.php -->
@extends('front.layouts.app')

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
                        <img src="{{ asset('images/default_cover.png') }}" class="img-fluid mb-3" alt="Default Cover">
                    @endif

                    <h5>Title: {{ $book->title }}</h5>
                    <p>Author: {{ $book->author }}</p>
                    <p>Description: {{ $book->description }}</p>

                    <!-- Display Reviews -->
                    <h5 class="mt-4">Reviews</h5>
                    @forelse ($book->reviews as $review)
                        <div class="border p-3 mb-2">
                            <strong>{{ $review->user->name }}</strong>
                            <p>Rating: {{ $review->rating }} / 5</p>
                            <p>{{ $review->content }}</p>
                        </div>
                    @empty
                        <p>No reviews yet.</p>
                    @endforelse

                    <!-- Review Form -->
                    @auth
                        <form action="{{ route('reviews.store', $book->id) }}" method="POST" class="mt-4">
                            @csrf
                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <select id="rating" name="rating" class="form-control" required>
                                    <option value="">Select Rating</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="content">Write a Review:</label>
                                <textarea id="content" name="content" class="form-control" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit Review</button>
                        </form>
                    @else
                        <p class="mt-4">Please <a href="{{ route('login') }}">log in</a> to post a review.</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
