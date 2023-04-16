<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function checkToken()
    {
        $token = session('token');
        $endPoint = env('API_API_URL') . '/notes';
        $response = Http::withHeaders(['pbe-token'
            => $token])->get($endPoint);
        if ($response->failed())
        {
            return redirect(url('/login'));
        }
    }
}
