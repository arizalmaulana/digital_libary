<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\RentLogs;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function petugas()
    {
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        $rentlogs = RentLogs::with('user', 'book')->get();
        return view('dashboard', ['book_count' => $bookCount, 'category_count' => $categoryCount, 'user_count' => $userCount, 'rent_logs' => $rentlogs ]);
    }
}
