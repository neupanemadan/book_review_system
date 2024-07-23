<!-- resources/views/admin/books/index.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Books') }}</div>

                <div class="card-body">
                    <a href="{{ route('admin.books.create') }}" class="btn btn-primary mb-3">Add New Book</a>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Reviews</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->reviews_count }}</td>
                                    <td>
                                        <a href="{{ route('admin.books.show', $book) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('admin.books.destroy', $book) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
