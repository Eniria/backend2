<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function verify()
    {
        $username = \request('username');
        $password = \request('password');
        $basicAuth = "Basic " . base64_encode($username . ":" . $password);
        $endPoint = env('APP_API_URL') . '/auth';
        $response = Http::withHeaders(['Authorization' => $basicAuth])->post($endPoint);
        if ($response->successful()) {
            $user = json_decode($response->body(), true);
            session($user);
            return redirect(url('/'));
        } else {
            dd("Username password salah");
        }
    }
}

