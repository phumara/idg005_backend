<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();

        return view('messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'author' => ['required', 'string', 'max:50'],
            'body' => ['required', 'string', 'max:1000'],
        ]);

        Message::create($validated);

        return redirect()->route('messages.index');
    }
}
