<?php

namespace App\Http\Controllers\Front;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:1000',
        ]);

        $review = new Review([
            'book_id' => $book->id,
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
            'rating' => $request->input('rating'),
        ]);

        $review->save();


        return redirect()->route('books.show', $book->id)->with('status', 'Review added successfully.');
    }
}
