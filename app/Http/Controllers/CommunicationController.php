<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CommunicationController extends Controller
{
    public function logout() {
        Auth::logout();
    }

    public function getUserBonuses($id) {
        $data = DB::connection('pgsql2')->table("user_bonuses")->where('user_id', $id)->where('deleted_at', null)->get();

        return view('user_details', [
            'userData' => $data
        ]);
    }

    public function softDeleteUserBonuses($id) {
        $link = env('REDIRECT_APP', "http://127.0.0.1:8001/");
        $redirectLink = rtrim($link,"/")."/api/softDeleteUserBonuses";
        $redirectPayload = [
            'id' => $id
        ];
        Http::post($redirectLink, $redirectPayload);

        return response()->json(['success' => true]);
    }
}
