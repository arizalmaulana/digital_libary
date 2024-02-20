<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 3)->where('id', Auth::user()->id)->get();
        $books = Book::all();
        return view('User.bookRent', ['users' => $users, 'books' => $books]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(7)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');

        if($book['status'] != 'Tersedia') {
            Session::flash('message', 'Tidak dapat meminjam, buku tidak tersedia');
            Session::flash('alert-class', 'alert-danger');
            return redirect('peminjaman-buku');
        }
        else {
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if ($count >= 3) {
                Session::flash('message', 'Tidak dapat meminjam, pengguna sudah mencapai batas peminjaman buku');
                Session::flash('alert-class', 'alert-danger');
                return redirect('peminjaman-buku');
            }
            else {
                try {
                    DB::beginTransaction();
                    // proses masuk ke table rent_logs
                    RentLogs::create($request->all());
                    // proses update table books
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'Tidak Tersedia';
                    $book->save();
                    DB::commit();

                    Session::flash('message', 'Peminjaman buku berhasil!');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('peminjaman-buku');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function returnBook()
    {
        $users = User::where('role_id', 3)->where('status', '!=', 'Tidak Aktif')->get();
        $books = Book::all();
        return view('Admin.return-book', ['users' => $users, 'books' => $books]);
    }

    public function saveReturnBook(Request $request)
    {
        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();

        if ($countData == 1) {
            # code...
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            // Mengubah status buku menjadi tersedia
            $book = Book::find($request->book_id);
            $book->status = 'Tersedia';
            $book->save();

            Session::flash('message', 'Buku telah berhasil dikembalikan');
            Session::flash('alert-class', 'alert-success');
            return redirect('pengembalian-buku');
        }
        else {
            # code...
            Session::flash('message', 'Buku gagal dikembalikan');
            Session::flash('alert-class', 'alert-danger');
            return redirect('pengembalian-buku');
        }
    }
}
