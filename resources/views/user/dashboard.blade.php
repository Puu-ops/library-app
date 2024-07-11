<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('รายการหนังสือ') }}
        </h2>
    </x-slot>

    <style>
        .book-container {
            height: 100%; /* กำหนดความสูงของกล่อง */
            width: 20%; /* เพิ่มความกว้างของกล่อง */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 1rem; /* เพิ่ม padding เพื่อให้เนื้อหาอยู่ตรงกลางของกล่อง */
        }

        .book-image {
            max-width: 100%; /* กำหนดความกว้างสูงสุดของรูปภาพ */
            max-height: 200px; /* กำหนดความสูงสูงสุดของรูปภาพ */
            object-fit: cover; /* ให้รูปภาพทำการปรับขนาดให้เต็มกล่องโดยที่ไม่ทำให้สะท้อน */
            border-radius: 8px; /* กำหนดรูปร่างของมุม */
            margin-bottom: 0.5rem; /* เพิ่มระยะห่างด้านล่างของรูปภาพ */
        }

        .book-title {
            font-size: 1rem; /* กำหนดขนาดตัวอักษรของชื่อหนังสือ */
            margin-top: 0.5rem; /* เพิ่มระยะห่างด้านบนของชื่อหนังสือ */
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- แสดงรายการหนังสือ -->
                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($books as $book)
                            <div class="bg-gray-100 border border-gray-200 p-4 rounded-lg shadow-md book-container">
                                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="rounded-md mb-2 book-image">
                                <h3 class="text-lg mb-2 book-title">{{ $book->title }}</h3>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
