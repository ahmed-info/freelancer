<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            المحادثة مع: {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- حاوية الرسائل -->
                    <div id="messagesContainer" class="h-96 overflow-y-auto mb-4 p-4 border border-gray-200 rounded-lg">
                        <div id="messages">
                            <!-- سيتم تحميل الرسائل هنا عبر JavaScript -->
                        </div>
                    </div>

                    <!-- نموذج إرسال الرسالة -->
                    <form id="messageForm" class="flex gap-2">
                        @csrf
                        <input type="text"
                               id="messageInput"
                               name="message"
                               placeholder="اكتب رسالتك هنا..."
                               class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               required>
                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            إرسال
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // سكريبت لإدارة المحادثة في الوقت الحقيقي
        document.addEventListener('DOMContentLoaded', function() {
            const messagesContainer = document.getElementById('messagesContainer');
            const messagesDiv = document.getElementById('messages');
            const messageForm = document.getElementById('messageForm');
            const messageInput = document.getElementById('messageInput');
            const currentUser = {{ auth()->id() }};
            const chatUser = {{ $user->id }};

            // تحميل الرسائل عند فتح الصفحة
            loadMessages();

            // إرسال الرسالة
            messageForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const message = messageInput.value.trim();
                if (message === '') return;

                fetch(`/messages/${chatUser}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message: message })
                })
                .then(response => response.json())
                .then(data => {
                    messageInput.value = '';
                    addMessageToChat(data);
                })
                .catch(error => console.error('Error:', error));
            });

            // تحميل الرسائل من السيرفر
            function loadMessages() {
                fetch(`/messages/${chatUser}`)
                    .then(response => response.json())
                    .then(messages => {
                        messagesDiv.innerHTML = '';
                        messages.forEach(message => addMessageToChat(message));
                        scrollToBottom();
                    });
            }

            // إضافة رسالة للشات
            function addMessageToChat(message) {
                const messageElement = document.createElement('div');
                messageElement.className = `mb-3 ${message.sender_id === currentUser ? 'text-right' : 'text-left'}`;

                messageElement.innerHTML = `
                    <div class="inline-block max-w-xs lg:max-w-md px-4 py-2 rounded-lg ${message.sender_id === currentUser ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-800'}">
                        <div class="text-sm">${escapeHtml(message.text)}</div>
                        <div class="text-xs mt-1 opacity-70">${new Date(message.created_at).toLocaleTimeString()}</div>
                    </div>
                `;

                messagesDiv.appendChild(messageElement);
                scrollToBottom();
            }

            // التمرير للأسفل
            function scrollToBottom() {
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }

            // دالة للأمان
            function escapeHtml(unsafe) {
                return unsafe
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#039;");
            }
        });
        // الاستماع للرسائل الجديدة
        window.Echo.private(`chat.${currentUser}`)
    .listen('MessageSent', (e) => {
        addMessageToChat(e.message);
    });
    </script>

    @endpush
</x-app-layout>
