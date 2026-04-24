<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat với AI - Cloudyy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .chat-messages {
            max-height: 500px;
            overflow-y: auto;
        }
        .message-bubble {
            max-width: 70%;
            word-wrap: break-word;
        }
        .typing-indicator {
            display: none;
        }
        .typing-indicator.show {
            display: flex;
        }
        .pulse {
            animation: pulse 1.5s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <a href="/" class="text-2xl font-bold text-indigo-600">
                    <i class="fas fa-shoe-prints mr-2"></i>Cloudyy
                </a>
                <nav class="hidden md:flex space-x-6">
                    <a href="/" class="text-gray-600 hover:text-indigo-600">Trang chủ</a>
                    <a href="/cart" class="text-gray-600 hover:text-indigo-600">Giỏ hàng</a>
                    <a href="/chat" class="text-indigo-600 font-semibold">Chat AI</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Chat Container -->
    <div class="container mx-auto px-6 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Chat Header -->
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white p-6">
                    <div class="flex items-center">
                        <div class="bg-white/20 p-3 rounded-full mr-4">
                            <i class="fas fa-robot text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold">Trợ lý AI Cloudyy</h1>
                            <p class="text-indigo-100">Tôi sẽ giúp bạn tìm hiểu về sản phẩm và đặt hàng</p>
                        </div>
                    </div>
                </div>

                <!-- Chat Messages -->
                <div class="p-6">
                    <div id="chat-messages" class="chat-messages space-y-4 mb-4">
                        <!-- Welcome message -->
                        <div class="flex items-start">
                            <div class="bg-indigo-500 text-white p-4 rounded-2xl rounded-tl-md message-bubble">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-robot mr-2"></i>
                                    <span class="font-semibold">Cloudyy AI</span>
                                </div>
                                <p>Xin chào! 👋 Tôi là trợ lý AI của Cloudyy. Tôi có thể giúp bạn:</p>
                                <ul class="mt-2 space-y-1 text-sm">
                                    <li>• Tư vấn về các mẫu giày</li>
                                    <li>• Hướng dẫn chọn kích cỡ phù hợp</li>
                                    <li>• Thông tin về giá cả và khuyến mãi</li>
                                    <li>• Hỗ trợ đặt hàng và giao hàng</li>
                                    <li>• Chính sách đổi trả</li>
                                </ul>
                                <p class="mt-2">Bạn cần hỗ trợ gì hôm nay?</p>
                            </div>
                        </div>
                    </div>

                    <!-- Typing indicator -->
                    <div id="typing-indicator" class="typing-indicator flex items-center space-x-2 text-gray-500 mb-4">
                        <div class="bg-indigo-500 text-white p-2 rounded-full">
                            <i class="fas fa-robot text-sm"></i>
                        </div>
                        <div class="flex space-x-1">
                            <div class="w-2 h-2 bg-indigo-500 rounded-full pulse"></div>
                            <div class="w-2 h-2 bg-indigo-500 rounded-full pulse" style="animation-delay: 0.2s"></div>
                            <div class="w-2 h-2 bg-indigo-500 rounded-full pulse" style="animation-delay: 0.4s"></div>
                        </div>
                        <span class="text-sm">Đang trả lời...</span>
                    </div>

                    <!-- Chat Input -->
                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <input
                                type="text"
                                id="message-input"
                                placeholder="Nhập câu hỏi của bạn..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                maxlength="1000"
                            >
                        </div>
                        <button
                            id="send-button"
                            class="bg-indigo-600 text-white px-6 py-3 rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            <i class="fas fa-paper-plane mr-2"></i>Gửi
                        </button>
                    </div>

                    <!-- Quick suggestions -->
                    <div class="mt-4 flex flex-wrap gap-2">
                        <button class="quick-suggestion bg-gray-100 text-gray-700 px-3 py-2 rounded-lg text-sm hover:bg-gray-200 transition duration-200">
                            Tư vấn kích cỡ
                        </button>
                        <button class="quick-suggestion bg-gray-100 text-gray-700 px-3 py-2 rounded-lg text-sm hover:bg-gray-200 transition duration-200">
                            Giá cả sản phẩm
                        </button>
                        <button class="quick-suggestion bg-gray-100 text-gray-700 px-3 py-2 rounded-lg text-sm hover:bg-gray-200 transition duration-200">
                            Chính sách giao hàng
                        </button>
                        <button class="quick-suggestion bg-gray-100 text-gray-700 px-3 py-2 rounded-lg text-sm hover:bg-gray-200">
                            Hướng dẫn đặt hàng
                        </button>
                    </div>
                </div>
            </div>

            <!-- Info Section -->
            <div class="mt-8 grid md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <i class="fas fa-shipping-fast text-3xl text-indigo-600 mb-4"></i>
                    <h3 class="font-semibold text-gray-800 mb-2">Giao hàng tận nơi</h3>
                    <p class="text-gray-600 text-sm">Miễn phí ship cho đơn hàng từ 1 triệu đồng</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <i class="fas fa-undo text-3xl text-green-600 mb-4"></i>
                    <h3 class="font-semibold text-gray-800 mb-2">Đổi trả dễ dàng</h3>
                    <p class="text-gray-600 text-sm">Đổi trả trong 7 ngày với sản phẩm còn mới</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <i class="fas fa-headset text-3xl text-purple-600 mb-4"></i>
                    <h3 class="font-semibold text-gray-800 mb-2">Hỗ trợ 24/7</h3>
                    <p class="text-gray-600 text-sm">Chat với AI hoặc gọi hotline 1900-xxxx</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const messageInput = document.getElementById('message-input');
            const sendButton = document.getElementById('send-button');
            const chatMessages = document.getElementById('chat-messages');
            const typingIndicator = document.getElementById('typing-indicator');

            // CSRF token for Laravel
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ||
                            '{{ csrf_token() }}';

            // Send message function
            async function sendMessage(message) {
                if (!message.trim()) return;

                // Add user message to chat
                addMessage(message, 'user');

                // Clear input
                messageInput.value = '';

                // Show typing indicator
                typingIndicator.classList.add('show');

                try {
                    const response = await fetch('/chat/send', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ message: message })
                    });

                    const data = await response.json();

                    // Hide typing indicator
                    typingIndicator.classList.remove('show');

                    if (data.success) {
                        // Add AI response
                        setTimeout(() => addMessage(data.message, 'ai'), 500);
                    } else {
                        addMessage('Xin lỗi, có lỗi xảy ra. Vui lòng thử lại.', 'ai');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    typingIndicator.classList.remove('show');
                    addMessage('Không thể kết nối với server. Vui lòng thử lại.', 'ai');
                }
            }

            // Add message to chat
            function addMessage(message, sender) {
                const messageDiv = document.createElement('div');
                messageDiv.className = `flex items-start ${sender === 'user' ? 'justify-end' : ''}`;

                const bubbleClass = sender === 'user'
                    ? 'bg-indigo-600 text-white rounded-2xl rounded-tr-md'
                    : 'bg-gray-100 text-gray-800 rounded-2xl rounded-tl-md';

                messageDiv.innerHTML = `
                    ${sender === 'ai' ? `
                        <div class="bg-indigo-500 text-white p-2 rounded-full mr-3 flex-shrink-0">
                            <i class="fas fa-robot text-sm"></i>
                        </div>
                    ` : ''}
                    <div class="${bubbleClass} p-4 message-bubble">
                        ${sender === 'ai' ? '<div class="flex items-center mb-2"><i class="fas fa-robot mr-2"></i><span class="font-semibold">Cloudyy AI</span></div>' : ''}
                        <p class="whitespace-pre-wrap">${message}</p>
                    </div>
                    ${sender === 'user' ? `
                        <div class="bg-indigo-600 text-white p-2 rounded-full ml-3 flex-shrink-0">
                            <i class="fas fa-user text-sm"></i>
                        </div>
                    ` : ''}
                `;

                chatMessages.appendChild(messageDiv);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            // Event listeners
            sendButton.addEventListener('click', () => {
                const message = messageInput.value.trim();
                if (message) {
                    sendMessage(message);
                }
            });

            messageInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    const message = messageInput.value.trim();
                    if (message) {
                        sendMessage(message);
                    }
                }
            });

            // Quick suggestions
            document.querySelectorAll('.quick-suggestion').forEach(button => {
                button.addEventListener('click', () => {
                    const suggestion = button.textContent;
                    messageInput.value = suggestion;
                    messageInput.focus();
                });
            });

            // Auto-focus input
            messageInput.focus();
        });
    </script>
</body>
</html>