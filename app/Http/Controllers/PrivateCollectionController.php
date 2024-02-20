<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PrivateCollection;
use Illuminate\Support\Facades\Auth;

class PrivateCollectionController extends Controller
{
    public function index()
    {
        $koleksi = PrivateCollection::with(['user', 'book'])->get();
        return view('User.koleksi', ['koleksi' => $koleksi]);
    }

    public function add()
    {
        $users = User::where('role_id', 3)->where('id', Auth::user()->id)->get();
        $books = Book::all();
        return view('User.koleksi-add', ['users' => $users, 'books' => $books]);
    }

    public function store(Request $request)
    {
        $category = PrivateCollection::create($request->all());
        return redirect('koleksi')->with('status', 'Koleksi berhasil ditambahkan');
    }

    public function delete($id)
    {
        $koleksi = PrivateCollection::where('id', $id)->first();
        $koleksi -> delete();
        return redirect('koleksi')->with('status', 'Koleksi berhasil dihapus');
    }
}
