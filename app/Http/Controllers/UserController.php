<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Petugas;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users2 = User::where('role_id', 2)->where('status', 'Aktif')->get();
        $users3 = User::where('role_id', 3)->where('status', 'Aktif')->get();
        $users = User::where('status', 'Tidak Aktif')->get();
        return view('Admin.user', ['users2' => $users2, 'users3'=>$users3, 'users'=>$users]);
    }

    public function detail($slug)
    {
        $user = User::where('slug', $slug)->first();
        $rentlogs = RentLogs::with(['user', 'book'])->where('user_id', $user->id)->get();
        return view('Admin.user-detail', ['user' => $user, 'rent_logs' => $rentlogs]);
    }

    public function confirm($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'Aktif';
        $user->save();

        return redirect('detail-pengguna/'.$slug)->with('status', 'Konfirmasi berhasil');
    }

    public function delete($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();

        return redirect('pengguna')->with('status', 'Pengguna berhasil dihapus');
    }

    public function bannedUser()
    {
        $bannedUsers = User::onlyTrashed()->where('role_id', 3)->get();

        return view('Admin.user-banned', ['bannedUsers' => $bannedUsers]);
    }

    public function bannedPetugas()
    {
        $bannedPetugas = User::onlyTrashed()->where('role_id', 2)->get();

        return view('Admin.petugas-banned', ['bannedPetugas' => $bannedPetugas]);
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();

        return redirect('pengguna')->with('status', 'Pengguna berhasil dipulihkan');
    }

    public function addPetugas()
    {
        return view('Petugas.petugas-add');
    }

    public function storePetugas(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'name' => 'required|max:255',
            'address' => 'required',
        ]);

        $request['password']=Hash::make($request->password);
        $petugas = User::create($request->all());


        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Daftar berhasil. Tunggu admin untuk konfirmasi!');
        return redirect('pengguna');
    }
}
