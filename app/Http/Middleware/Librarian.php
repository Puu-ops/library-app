<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class Librarian
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // ไม่ให้ librarian เข้าถึงหน้า Admin
            if ($user->usertype == "librarian" && ($request->is('admin*'))) {
                return redirect('books/create');
            }

            // ไม่ให้ user เข้าถึงหน้า Librarian Dashboard
            if ($user->usertype == "user" && $request->is('books/create*')) {
                return redirect('dashboard');
            }
        }

        return $next($request);
    }

}
