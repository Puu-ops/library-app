<!-- resources/views/books/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Books') }}
        </h2>
    </x-slot>

    <style>
        .book-list {
            padding: 1rem;
        }
        .book-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            background-color: #f9f9f9;
        }
        .book-details {
            margin-left: 1rem;
        }
        .book-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }
        .book-author {
            font-size: 1rem;
            color: #555;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: #d32f2f;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($books->isEmpty())
                        <p>No books found.</p>
                    @else
                        <div class="book-list">
                            @foreach ($books as $book)
                                <div class="book-item">
                                    <div>
                                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="h-24">
                                    </div>
                                    <div class="book-details">
                                        <div class="book-title">{{ $book->title }}</div>
                                        <div class="book-author">by {{ $book->author }}</div>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
