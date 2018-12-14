<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query();
        if (request('gender')) {
            $users->whereDoesntHave('profile', function($query) {
                $query->where('gender', '!=', request('gender'));
            });
        }

        return view('welcome', [
            'users' => $users->paginate(10)
        ]);
    }
}
