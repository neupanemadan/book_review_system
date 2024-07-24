@extends('front.layouts.app')

@section('content')
    <div class="container">
        <!-- Banner Section -->
        <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">Welcome to the Book Review System</h1>
                <p class="lead my-3">Discover and share reviews on your favorite books.</p>
                <p class="lead mb-0"><a href="#" class="text-white fw-bold">Learn more...</a></p>
            </div>
        </div>

        <!-- Book List Section -->
        <div class="mt-4">
            <h2 class="text-center">Featured Books</h2>
            <div class="row">
                @foreach($books as $book)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            @if ($book->cover_image)
                                <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" alt="{{ $book->title }}">
                            @else
                                <img src="{{ asset('images/default_cover.png') }}" class="card-img-top" alt="Default Cover">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <p class="card-text">Author: {{ $book->author }}</p>
                                <p class="card-text">Reviews: {{ $book->reviews_count }}</p>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
