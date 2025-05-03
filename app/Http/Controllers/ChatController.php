<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $messages = [
            (object) ['sender' => 'student', 'content' => 'Hello!'],
            (object) ['sender' => 'assistant', 'content' => 'Hi! How can I assist you today?'],
            (object) ['sender' => 'student', 'content' => 'I need help with my assignment.'],
            (object) ['sender' => 'assistant', 'content' => 'Sure! What do you need help with?'],
        ];

        return view('chat.index', compact('messages'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $userMessage = Chat::create([
            'sender' => 'student',
            'content' => $request->input('content')
        ]);

        $botResponse = Chat::create([
            'sender' => 'bot',
            'content' => 'Thanks for your message! I will get back to you shortly.' // Replace this with your logic
        ]);

        return response()->json([
            'user_message' => $userMessage,
            'bot_message' => $botResponse
        ]);
    }


    public function sendMessage(Request $request)
    {
        // Logic to handle sending a message
        return response()->json(['status' => 'Message sent']);
    }

    public function receiveMessages()
    {
        // Logic to handle receiving messages
        return response()->json(['messages' => []]);
    }
}