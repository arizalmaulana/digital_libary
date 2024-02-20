<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function ReviewAdmin()
    {
        $reviews = Review::with(['user', 'book'])->get();
        return view('Admin.review', ['reviews' => $reviews]);
    }

    public function ReviewUser()
    {
        $reviews = Review::with(['user', 'book'])->get();
        return view('User.review', ['reviews' => $reviews]);
    }

    public function add()
    {
        $users = User::where('role_id', 3)->where('id', Auth::user()->id)->get();
        $books = Book::all();
        return view('User.review-add', ['users' => $users, 'books' => $books]);
    }

    public function store(Request $request)
    {
        $category = Review::create($request->all());
        return redirect('ulasan-pengguna')->with('status', 'Ulasan berhasil ditambahkan');
    }

    public function delete($id)
    {
        $reviews = Review::where('id', $id)->first();
        $reviews -> delete();
        return redirect('ulasan-pengguna')->with('status', 'Ulasan berhasil dihapus');
    }
}
