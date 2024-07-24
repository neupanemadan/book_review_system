<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @isset($method)
        @method($method)
    @endisset

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" class="form-control" value="{{ old('author', $book->author ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required>{{ old('description', $book->description ?? '') }}</textarea>
    </div>

    <div class="form-group">
        <label for="cover_image">Cover Image</label>
        <input type="file" name="cover_image" class="form-control">
        @if (isset($book) && $book->cover_image)
            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover Image" width="100">
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
