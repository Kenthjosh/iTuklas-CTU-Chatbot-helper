{{-- resources/views/chat/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chatbot</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100">
    {{-- Insert the Livewire component --}}
    @livewire('chatbot')

    @vite('resources/js/app.js')
    @livewireScripts
</body>
</html>
