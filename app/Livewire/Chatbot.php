<?php

namespace App\Livewire;

use App\Models\Chat;
use App\Models\Conversation;
use Illuminate\Support\Facades\Http;
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

        try {
            $conversation = isset(Conversation::latest()->first()->id) ? Conversation::latest()->first()->id : Conversation::factory()->create()->id;

            $studentMessage = Chat::create([
                'conversation_id' => $conversation,
                'sender' => 'student',
                'content' => $this->newMessage,
                'start_date' => now(),
            ]);

            // $response = Http::post('https://binaryideas.app.n8n.cloud/webhook-test/0a3f0ea6-f2f2-4c1d-badc-287b23d81662', [
            //     'message' => $this->newMessage
            // ]);

            // $botReply = Chat::create([
            //     'conversation_id' => $conversation,
            //     'sender' => 'bot',
            //     'content' => $response->json('reply'),
            //     'start_date' => now(),
            // ]);

            // dd($studentMessage);
            $this->messages[] = ['sender' => 'student', 'content' => $this->newMessage];
            // $this->messages[] = ['sender' => 'bot', 'content' => $botReply->content];
            $this->messages[] = ['sender' => 'bot', 'content' => 'Oops! Something went wrong.'];
        } catch (\Exception $e) {
            $this->messages[] = ['sender' => 'student', 'content' => $this->newMessage];
            // $this->messages[] = ['sender' => 'bot', 'content' => $botReply->content];
            $this->messages[] = ['sender' => 'bot', 'content' => 'Oops! Something went wrong.'];
        }

        $this->newMessage = '';
    }

    public function render()
    {
        return view('livewire.chatbot');
    }
}
