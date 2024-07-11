<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($errors->any())
                        <div class="mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-600">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Author:</label>
                            <input type="text" id="author" name="author" value="{{ old('author') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                            <input type="text" id="category" name="category" value="{{ old('category') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Book Cover Image:</label>
                            <input type="file" id="image" name="image" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">Add Book</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    /* สไตล์ CSS สำหรับปุ่ม Add Book */
    button {
        background-color: #4CAF50; /* สีพื้นหลัง */
        color: white; /* สีตัวอักษร */
        padding: 12px 20px; /* ขนาดของปุ่ม */
        text-align: center; /* จัดตำแหน่งข้อความตรงกลาง */
        text-decoration: none; /* ไม่มีเส้นใต้ข้อความ */
        display: inline-block; /* แสดงเป็นบล็อกที่มีขนาดเท่ากัน */
        font-size: 16px; /* ขนาดตัวอักษร */
        margin: 4px 2px; /* ระยะห่างของปุ่ม */
        cursor: pointer; /* เปลี่ยนรูปลักษณ์เมื่อเมาส์ไปวางบนปุ่ม */
        border-radius: 8px; /* ขอบโค้ง */
        transition: background-color 0.3s ease; /* เอฟเฟกต์การเปลี่ยนสีพื้นหลัง */
    }

    /* เมื่อเมาส์ไปวางบนปุ่ม */
    button:hover {
        background-color: #45a049;
    }
</style>
