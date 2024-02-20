<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('Book.book', ['books' => $books]);
    }

    public function add()
    {
        $categories = Category::all();
        return view('Book.book-add', ['categories' =>$categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher' => 'required|max:255',
            'published' => 'required|max:11'
        ]);

        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);
        return redirect('buku')->with('status', 'Buku berhasil ditambahkan');
    }

    public function edit($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();

        return view('Book.book-edit', ['categories' => $categories, 'book' => $book]);
    }

    public function update(Request $request, $slug)
    {
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }

        $book = Book::where('slug', $slug)->first();
        $book->update($request->all());

        if ($request->categories) {
            $book->categories()->sync($request->categories);
        }

        return redirect('buku')->with('status', 'Buku berhasil diupdate');
    }

    public function delete($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $book -> delete();
        return redirect('buku')->with('status', 'Buku berhasil dihapus');
    }

    public function deletedBook()
    {
        $deletedBooks = Book::onlyTrashed()->get();
        return view('Book.book-deleted', ['deletedBooks' => $deletedBooks]);
    }

    public function restore($slug)
    {
        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->restore();
        return redirect('buku')->with('status', 'Buku berhasil dipulihkan');
    }
}
