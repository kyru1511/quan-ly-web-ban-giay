<!-- Chatbot Widget -->
<div id="chatbot-widget" class="fixed bottom-6 right-6 z-50">
    <!-- Chat Button -->
    <button id="chat-toggle" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-full p-4 shadow-lg transition-all duration-300 transform hover:scale-110">
        <i class="fas fa-comments text-xl"></i>
        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-6 h-6 flex items-center justify-center animate-pulse" id="notification-badge" style="display: none;">!</span>
    </button>

    <!-- Chat Window -->
    <div id="chat-window" class="hidden absolute bottom-16 right-0 w-80 h-96 bg-white rounded-2xl shadow-2xl border border-gray-200 flex flex-col overflow-hidden">
        <!-- Chat Header -->
        <div class="bg-indigo-600 text-white p-4 rounded-t-2xl flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                    <i class="fas fa-robot text-sm"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-sm">AI Trợ lý</h3>
                    <p class="text-xs opacity-90">Cloudyy Support</p>
                </div>
            </div>
            <button id="chat-close" class="text-white hover:text-gray-200 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Chat Messages -->
        <div id="chat-messages" class="flex-1 p-4 space-y-3 overflow-y-auto bg-gray-50">
            <div class="flex gap-3">
                <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-robot text-white text-xs"></i>
                </div>
                <div class="bg-white p-3 rounded-2xl rounded-tl-md shadow-sm max-w-xs">
                    <p class="text-sm text-gray-800">Xin chào! Tôi là trợ lý AI của Cloudyy. Tôi có thể giúp bạn tìm hiểu về sản phẩm, tư vấn kích cỡ, hoặc trả lời câu hỏi về đặt hàng. Bạn cần hỗ trợ gì hôm nay?</p>
                    <p class="text-xs text-gray-500 mt-1">{{ date('H:i') }}</p>
                </div>
            </div>
        </div>

        <!-- Typing Indicator -->
        <div id="typing-indicator" class="hidden px-4 py-2">
            <div class="flex items-center gap-2">
                <div class="flex gap-1">
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                </div>
                <span class="text-xs text-gray-500">AI đang trả lời...</span>
            </div>
        </div>

        <!-- Chat Input -->
        <div class="p-4 border-t border-gray-200 bg-white">
            <div class="flex gap-2">
                <input type="text" id="chat-input" placeholder="Nhập câu hỏi của bạn..."
                       class="flex-1 px-3 py-2 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <button id="chat-send" class="bg-indigo-600 hover:bg-indigo-700 text-white p-2 rounded-full transition disabled:opacity-50 disabled:cursor-not-allowed">
                    <i class="fas fa-paper-plane text-sm"></i>
                </button>
            </div>
            <div class="flex gap-1 mt-2 text-xs text-gray-500">
                <span class="px-2 py-1 bg-gray-100 rounded-full">💬 Tư vấn sản phẩm</span>
                <span class="px-2 py-1 bg-gray-100 rounded-full">📏 Hướng dẫn size</span>
                <span class="px-2 py-1 bg-gray-100 rounded-full">🚚 Giao hàng</span>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatToggle = document.getElementById('chat-toggle');
    const chatWindow = document.getElementById('chat-window');
    const chatClose = document.getElementById('chat-close');
    const chatInput = document.getElementById('chat-input');
    const chatSend = document.getElementById('chat-send');
    const chatMessages = document.getElementById('chat-messages');
    const typingIndicator = document.getElementById('typing-indicator');
    const notificationBadge = document.getElementById('notification-badge');

    let isOpen = false;

    // Toggle chat window
    chatToggle.addEventListener('click', function() {
        isOpen = !isOpen;
        chatWindow.classList.toggle('hidden', !isOpen);
        if (isOpen) {
            chatInput.focus();
            notificationBadge.style.display = 'none';
        }
    });

    // Close chat
    chatClose.addEventListener('click', function() {
        isOpen = false;
        chatWindow.classList.add('hidden');
    });

    // Send message
    function sendMessage() {
        const message = chatInput.value.trim();
        if (!message) return;

        // Add user message
        addMessage(message, 'user');
        chatInput.value = '';

        // Show typing indicator
        typingIndicator.classList.remove('hidden');

        // Send to server
        fetch('/chat/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            },
            body: JSON.stringify({ message: message })
        })
        .then(response => response.json())
        .then(data => {
            typingIndicator.classList.add('hidden');
            if (data.success) {
                addMessage(data.message, 'bot');
            } else {
                addMessage('Xin lỗi, có lỗi xảy ra. Vui lòng thử lại sau.', 'bot');
            }
        })
        .catch(error => {
            typingIndicator.classList.add('hidden');
            addMessage('Không thể kết nối đến server. Vui lòng thử lại sau.', 'bot');
            console.error('Chat error:', error);
        });
    }

    // Add message to chat
    function addMessage(text, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `flex gap-3 ${sender === 'user' ? 'justify-end' : ''}`;

        const avatarDiv = document.createElement('div');
        avatarDiv.className = `w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 ${
            sender === 'user' ? 'bg-indigo-600' : 'bg-indigo-600'
        }`;

        const avatarIcon = document.createElement('i');
        avatarIcon.className = `fas ${sender === 'user' ? 'fa-user' : 'fa-robot'} text-white text-xs`;
        avatarDiv.appendChild(avatarIcon);

        const contentDiv = document.createElement('div');
        contentDiv.className = `p-3 rounded-2xl shadow-sm max-w-xs ${
            sender === 'user'
                ? 'bg-indigo-600 text-white rounded-tr-md'
                : 'bg-white text-gray-800 rounded-tl-md'
        }`;

        const textP = document.createElement('p');
        textP.className = 'text-sm';
        textP.textContent = text;
        contentDiv.appendChild(textP);

        const timeP = document.createElement('p');
        timeP.className = `text-xs mt-1 ${sender === 'user' ? 'text-indigo-200' : 'text-gray-500'}`;
        timeP.textContent = new Date().toLocaleTimeString('vi-VN', { hour: '2-digit', minute: '2-digit' });
        contentDiv.appendChild(timeP);

        if (sender === 'user') {
            messageDiv.appendChild(contentDiv);
            messageDiv.appendChild(avatarDiv);
        } else {
            messageDiv.appendChild(avatarDiv);
            messageDiv.appendChild(contentDiv);
        }

        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Event listeners
    chatSend.addEventListener('click', sendMessage);
    chatInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });

    // Show notification after 5 seconds
    setTimeout(() => {
        if (!isOpen) {
            notificationBadge.style.display = 'flex';
        }
    }, 5000);
});
</script>