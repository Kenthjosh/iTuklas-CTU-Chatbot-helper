<!DOCTYPE html>
<html>
<head>
    <title>Chatbot</title>
    <link href="https://cdn.jsdelivr.net/npm/@n8n/chat/dist/style.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="bg-white rounded-lg shadow p-4 flex flex-col h-[600px] max-w-3xl mx-auto">
        <!-- Chat messages -->
        <div class="flex-1 px-2 mb-4 space-y-2 overflow-y-auto">
            <div id="n8n-chat" class=""></div>
        </div>
    </div>

    <script type="module">
        import { createChat } from 'https://cdn.jsdelivr.net/npm/@n8n/chat/dist/chat.bundle.es.js';
        createChat({
            webhookUrl: 'https://binaryideas.app.n8n.cloud/webhook/82adde8e-62ea-4180-accb-920133a4bb42/chat',
            mode: 'fullscreen',
            showWelcomeScreen: false,
            defaultLanguage: 'en',
            initialMessages: [
                'Hi there! 👋',
                "I'm your CTU Pal. How can I assist you today?"
            ],
            i18n: {
                en: {
                    title: 'CTU Pal - CTU Chatbot Helper',
                    subtitle: 'Your friendly assistant for all things CTU',
                    footer: 'Created by BSIT-3D Group 3',
                    getStarted: 'New Conversation',
                    inputPlaceholder: 'Type your question..',
                },
            },

        });
    </script>
    @vite('resources/js/app.js')

</body>
</html>
