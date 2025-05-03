<?php

namespace App\Livewire;

use App\Models\Chat;
use App\Models\Conversation;
use Livewire\Component;

class Chatbot extends Component
{
    public $messages = [];
    public $newMessage = '';

    public function mount()
    {
        $this->messages = Chat::orderBy('created_at')->get();
    }

    public function sendMessage()
    {
        if (trim($this->newMessage) === '') return;

        $conversation = Conversation::latest()->first()->id;

        $studentMessage = Chat::create([
            'conversation_id' => $conversation,
            'sender' => 'student',
            'content' => $this->newMessage,
            'start_date' => now(),
        ]);

        $botReply = Chat::create([
            'conversation_id' => $conversation,
            'sender' => 'bot',
            'content' => 'This is a simulated bot reply.',
            'start_date' => now(),
        ]);

        $this->messages[] = $studentMessage;
        $this->messages[] = $botReply;

        $this->newMessage = '';
    }

    public function render()
    {
        return view('livewire.chatbot');
    }
}