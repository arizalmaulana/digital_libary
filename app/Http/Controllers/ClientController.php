<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function client()
    {
        $users = User::where('id', Auth::user()->id)->get();
        $rentlogs = RentLogs::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
        return view('User.profile', ['users'=> $users, 'rent_logs' => $rentlogs]);
    }
}
