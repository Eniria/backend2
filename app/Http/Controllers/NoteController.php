<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NoteController extends Controller
{
    public function index()
    {
        $this->checkToken();
        $token = session('token');
        $endPoint = env('API_API_URL') . '/notes';
        $response = Http::withHeaders(['pbe-token'
        => $token])->get($endPoint);
        $notes = json_decode(
            $response->body(),
            false
        );
        $data = [
            'notes' => $notes
        ];
        return view('notes.list', $data);
    }

    public function create()
    {
        $this->checkToken();
        $token = session('token');
        $title = \request('title');
        $note = \request('note');
        $endPoint = env('API_API_URL') . '/notes';
        $body = [
            'title' => $title,
            'note' => $note
        ];
        $response = Http::withHeaders(['pbe-token'
        => $token])
            ->withBody(json_encode($body), 'text/
                json')
            ->post($endPoint);
        if ($response->successful()) {
            return redirect(url('/notes'));
        } else {
            return redirect(url('/login'));
        }
    }
}
