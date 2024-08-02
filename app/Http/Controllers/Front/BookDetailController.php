<?php

namespace App\Http\Controllers\Front;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookDetailController extends Controller
{
    public function store(Request $request, $bookId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $book = Book::findOrFail($bookId);

        $review = new Review([
            'book_id' => $book->id,
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
        ]);

        $review->save();

        return redirect()->route('front.show', $book->id)->with('status', 'Review added successfully.');
    }
    public function show(Book $book)
    {
        return view('front.show', compact('book'));
    }
}
