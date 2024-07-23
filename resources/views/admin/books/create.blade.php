<!-- resources/views/admin/books/create.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Book') }}</div>

                <div class="card-body">
                    @include('admin.books.form', ['action' => route('admin.books.store')])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
