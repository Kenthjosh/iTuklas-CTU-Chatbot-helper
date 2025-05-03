<div class="bg-white rounded-lg shadow p-4 flex flex-col h-[600px] max-w-3xl mx-auto">
    <h2 class="mb-4 text-xl font-semibold text-center">iTuklas - CTU Chatbot Helper</h2>

    <!-- Chat messages -->
    <div wire:poll.5s id="messages" class="flex-1 px-2 mb-4 space-y-2 overflow-y-auto">
        @foreach ($messages as $message)
        <div class="flex {{ $message->sender === 'bot' ? 'justify-start' : 'justify-end' }}">
            <div class="{{ $message->sender === 'bot' ? 'bg-gray-200 text-gray-800' : 'bg-blue-600 text-white' }} px-4 py-2 rounded-xl max-w-sm shadow">
                {{ $message->content }}
            </div>
        </div>
        @endforeach
    </div>

    <!-- Input section -->
    <div class="flex gap-2 mt-auto">
        <textarea wire:model.defer="newMessage" wire:keydown.enter.prevent="sendMessage" placeholder="Type your message here..." class="flex-1 p-2 text-sm border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500" rows="2"></textarea>
        <button wire:click="sendMessage" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
            Send
        </button>
    </div>
</div>
