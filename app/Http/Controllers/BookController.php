<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'nullable',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $book = new Book([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'category' => $request->category,
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $book->image = $path;
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    public function index()
    {
        $books = Book::all(); // Retrieve all books from the database

        return view('books.index', compact('books'));
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
