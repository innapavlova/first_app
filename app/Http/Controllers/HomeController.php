<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->hasRole('Admin')) {
            $users = User::all();
            return view('home', [
                'users' => $users
            ]);
        } else {
            $link = env('REDIRECT_APP', "http://127.0.0.1:8001/");
            $redirectLink = rtrim($link,"/")."/api/user_page";
            $redirectPayload = [
                'user_id' => Auth::user()->id
            ];
            return Http::post($redirectLink, $redirectPayload);
        }
    }
}
