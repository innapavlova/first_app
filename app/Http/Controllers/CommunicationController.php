<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CommunicationController extends Controller
{
    public function checkLogin() {
//        $id = auth()->check();
//        return 1;
//        return json_encode(Auth::user());
//        if (Auth::user()) {
//            $this->index();
//        }
    }

    public function logout() {
        Auth::logout();
    }
}
