@extends('layouts.app')

@section('title', 'Test Chatbot - Cloudyy')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 to-purple-50 py-12">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Test Chatbot AI</h1>
                <p class="text-xl text-gray-600">Kiểm tra tính năng chatbot AI trợ lý của Cloudyy</p>
            </div>

            <!-- Test Instructions -->
            <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Hướng dẫn test</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold text-indigo-600 mb-3">Câu hỏi mẫu:</h3>
                        <ul class="space-y-2 text-gray-700">
                            <li>• "Xin chào"</li>
                            <li>• "Giày Nike size bao nhiêu?"</li>
                            <li>• "Giao hàng như thế nào?"</li>
                            <li>• "Đổi trả trong bao lâu?"</li>
                            <li>• "Giá giày Adidas?"</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-green-600 mb-3">Tính năng:</h3>
                        <ul class="space-y-2 text-gray-700">
                            <li>• ✅ Chatbot hiện trên mọi trang</li>
                            <li>• ✅ AI Gemini (nếu có API key)</li>
                            <li>• ✅ Fallback responses</li>
                            <li>• ✅ UI hiện đại, responsive</li>
                            <li>• ✅ Animation mượt mà</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Test Chat Interface -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white p-6">
                    <h2 class="text-2xl font-bold">Chat Test Interface</h2>
                    <p class="text-indigo-100">Gửi tin nhắn để test chatbot</p>
                </div>

                <div class="p-6">
                    <!-- Chat Messages Area -->
                    <div id="test-messages" class="bg-gray-50 rounded-xl p-4 h-64 overflow-y-auto mb-4 space-y-3">
                        <div class="flex gap-3">
                            <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-robot text-white text-xs"></i>
                            </div>
                            <div class="bg-white p-3 rounded-2xl rounded-tl-md shadow-sm max-w-xs">
                                <p class="text-sm text-gray-800">Xin chào! Tôi là trợ lý AI của Cloudyy. Bạn cần hỗ trợ gì hôm nay?</p>
                                <p class="text-xs text-gray-500 mt-1">{{ date('H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Test Input -->
                    <div class="flex gap-3">
                        <input type="text" id="test-input" placeholder="Nhập câu hỏi của bạn..."
                               class="flex-1 px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <button id="test-send" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl font-semibold transition">
                            <i class="fas fa-paper-plane mr-2"></i>Gửi
                        </button>
                    </div>

                    <!-- Quick Test Buttons -->
                    <div class="mt-4 flex flex-wrap gap-2">
                        <button class="quick-test-btn bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg text-sm transition" data-message="Xin chào">
                            Xin chào
                        </button>
                        <button class="quick-test-btn bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg text-sm transition" data-message="Giày Nike giá bao nhiêu?">
                            Giá giày
                        </button>
                        <button class="quick-test-btn bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg text-sm transition" data-message="Giao hàng như thế nào?">
                            Giao hàng
                        </button>
                        <button class="quick-test-btn bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg text-sm transition" data-message="Đổi trả trong bao lâu?">
                            Đổi trả
                        </button>
                    </div>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-8">
                <a href="/" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-8 py-4 rounded-xl font-bold hover:from-indigo-600 hover:to-purple-700 transition transform hover:scale-105 shadow-lg inline-block">
                    <i class="fas fa-home mr-2"></i>Quay lại trang chủ
                </a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const testInput = document.getElementById('test-input');
    const testSend = document.getElementById('test-send');
    const testMessages = document.getElementById('test-messages');
    const quickTestBtns = document.querySelectorAll('.quick-test-btn');

    // Add message to test chat
    function addTestMessage(text, sender) {
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

        testMessages.appendChild(messageDiv);
        testMessages.scrollTop = testMessages.scrollHeight;
    }

    // Send test message
    function sendTestMessage() {
        const message = testInput.value.trim();
        if (!message) return;

        addTestMessage(message, 'user');
        testInput.value = '';

        // Show typing indicator
        const typingDiv = document.createElement('div');
        typingDiv.className = 'flex gap-3';
        typingDiv.innerHTML = `
            <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-robot text-white text-xs"></i>
            </div>
            <div class="bg-white p-3 rounded-2xl rounded-tl-md shadow-sm">
                <div class="flex gap-1">
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                </div>
            </div>
        `;
        testMessages.appendChild(typingDiv);
        testMessages.scrollTop = testMessages.scrollHeight;

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
            testMessages.removeChild(typingDiv);
            if (data.success) {
                addTestMessage(data.message, 'bot');
            } else {
                addTestMessage('Xin lỗi, có lỗi xảy ra. Vui lòng thử lại sau.', 'bot');
            }
        })
        .catch(error => {
            testMessages.removeChild(typingDiv);
            addTestMessage('Không thể kết nối đến server. Vui lòng thử lại sau.', 'bot');
            console.error('Test chat error:', error);
        });
    }

    // Event listeners
    testSend.addEventListener('click', sendTestMessage);
    testInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendTestMessage();
        }
    });

    // Quick test buttons
    quickTestBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            testInput.value = this.dataset.message;
            sendTestMessage();
        });
    });
});
</script>
@endsection