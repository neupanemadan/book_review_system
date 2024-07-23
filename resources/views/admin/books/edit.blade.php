<!-- resources/views/admin/books/edit.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Book') }}</div>

                <div class="card-body">
                    @include('admin.books.form', ['action' => route('admin.books.update', $book), 'method' => 'PUT'])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
