<!-- resources/views/front/books/show.blade.php -->
@extends('front.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-light">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ __('Book Details') }}</h5>
                </div>

                <div class="card-body">
                    <!-- Book Cover Image -->
                    @if ($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" class="img-fluid rounded mb-3" alt="{{ $book->title }}">
                    @else
                        <img src="{{ asset('images/default_cover.png') }}" class="img-fluid rounded mb-3" alt="Default Cover">
                    @endif

                    <!-- Book Information -->
                    <h4 class="mb-2">{{ $book->title }}</h4>
                    <h6 class="text-muted mb-3">Author: {{ $book->author }}</h6>
                    <p>{{ $book->description }}</p>

                    <!-- Average Rating -->
                    <div class="mb-4">
                        <h5 class="mb-2">Average Rating:</h5>
                        <div class="d-flex">
                            @php
                                $fullStars = floor($book->averageRating());
                                $halfStar = $book->averageRating() - $fullStars;
                            @endphp
                            @for ($i = 1; $i <= $fullStars; $i++)
                                <i class="fas fa-star text-warning"></i>
                            @endfor
                            @if ($halfStar >= 0.5)
                                <i class="fas fa-star-half-alt text-warning"></i>
                            @endif
                            @for ($i = $fullStars + ($halfStar >= 0.5 ? 1 : 0); $i < 5; $i++)
                                <i class="far fa-star text-muted"></i>
                            @endfor
                        </div>
                    </div>

                    <!-- Display Reviews -->
                    <h5 class="mt-4 mb-3">Reviews</h5>
                    @forelse ($book->reviews as $review)
                        <div class="border p-3 mb-2 rounded">
                            <strong>{{ $review->user->name }}</strong>
                            <div class="d-flex mt-3">
                                @php
                                    $reviewFullStars = floor($review->rating);
                                    $reviewHalfStar = $review->rating - $reviewFullStars;
                                @endphp
                                @for ($i = 1; $i <= $reviewFullStars; $i++)
                                    <i class="fas fa-star text-warning"></i>
                                @endfor
                                @if ($reviewHalfStar >= 0.5)
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                @endif
                                @for ($i = $reviewFullStars + ($reviewHalfStar >= 0.5 ? 1 : 0); $i < 5; $i++)
                                    <i class="far fa-star text-muted"></i>
                                @endfor
                            </div>
                            @if ($review->comment)
                                <p class="mt-2">{{ $review->comment }}</p>
                            @else
                                <p class="mt-2">No Comments</p>
                            @endif
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
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="content">Write a Review:</label>
                                <textarea id="content" name="comment" class="form-control" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
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
