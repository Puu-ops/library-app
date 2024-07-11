<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Import the Book model if not already imported

class UserController extends Controller
{
    public function dashboard()
    {
        $books = Book::all(); // Retrieve all books from the database

        return view('user.dashboard', [
            'books' => $books, // Pass books data to the view
        ]);
    }
}
