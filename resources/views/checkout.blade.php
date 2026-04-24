<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh Toán - SneakerHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <header class="bg-white shadow-sm py-4">
        <div class="container mx-auto px-6 text-center">
            <a href="/" class="text-3xl font-extrabold text-indigo-600">SNEAKER<span class="text-gray-800">HUB</span></a>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12">
        <div class="flex flex-col lg:flex-row gap-8 max-w-5xl mx-auto">
            
            <div class="lg:w-2/3 bg-white p-8 rounded-2xl shadow-sm">
                <h2 class="text-2xl font-bold mb-6">Thông tin giao hàng</h2>
                
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block font-semibold mb-1">Họ và tên</label>
                            <input type="text" name="customer_name" class="w-full border p-3 rounded-xl bg-gray-50" required>
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Số điện thoại</label>
                            <input type="text" name="customer_phone" class="w-full border p-3 rounded-xl bg-gray-50" required>
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Địa chỉ nhận hàng (Chi tiết)</label>
                            <textarea name="customer_address" rows="3" class="w-full border p-3 rounded-xl bg-gray-50" required></textarea>
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Ghi chú (Tùy chọn)</label>
                            <textarea name="notes" rows="2" class="w-full border p-3 rounded-xl bg-gray-50" placeholder="VD: Giao giờ hành chính..."></textarea>
                        </div>
                        
                        <div>
                            <label class="block font-semibold mb-3">Phương thức thanh toán</label>
                            <div class="space-y-3">
                                <label class="flex items-center p-4 border rounded-xl bg-gray-50 cursor-pointer hover:bg-gray-100 transition">
                                    <input type="radio" name="payment_method" value="cod" class="mr-3" checked>
                                    <div>
                                        <div class="font-semibold">Thanh toán khi nhận hàng (COD)</div>
                                        <div class="text-sm text-gray-600">Thanh toán bằng tiền mặt khi nhận hàng</div>
                                    </div>
                                </label>
                                
                                <label class="flex items-center p-4 border rounded-xl bg-gray-50 cursor-pointer hover:bg-gray-100 transition">
                                    <input type="radio" name="payment_method" value="bank" class="mr-3">
                                    <div>
                                        <div class="font-semibold">Chuyển khoản ngân hàng</div>
                                        <div class="text-sm text-gray-600">Thanh toán qua chuyển khoản ngân hàng</div>
                                    </div>
                                </label>
                                
                                <label class="flex items-center p-4 border rounded-xl bg-gray-50 cursor-pointer hover:bg-gray-100 transition">
                                    <input type="radio" name="payment_method" value="momo" class="mr-3">
                                    <div>
                                        <div class="font-semibold">Ví điện tử MoMo</div>
                                        <div class="text-sm text-gray-600">Thanh toán nhanh qua ứng dụng MoMo</div>
                                    </div>
                                </label>
                                
                                <label class="flex items-center p-4 border rounded-xl bg-gray-50 cursor-pointer hover:bg-gray-100 transition">
                                    <input type="radio" name="payment_method" value="installment" class="mr-3">
                                    <div>
                                        <div class="font-semibold">Thanh toán trả sau</div>
                                        <div class="text-sm text-gray-600">Thanh toán sau khi nhận hàng (tối đa 30 ngày)</div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Thông tin thanh toán bổ sung -->
                        <div id="bank-info" class="hidden mt-4 p-4 border rounded-xl bg-blue-50">
                            <h4 class="font-semibold mb-2">Thông tin chuyển khoản</h4>
                            <p class="text-sm text-gray-700 mb-2">Vui lòng chuyển khoản đến tài khoản sau:</p>
                            <div class="bg-white p-3 rounded border text-sm">
                                <p><strong>Ngân hàng:</strong> Vietcombank</p>
                                <p><strong>Số tài khoản:</strong> 1234567890</p>
                                <p><strong>Chủ tài khoản:</strong> SNEAKERHUB</p>
                                <p><strong>Nội dung:</strong> [Tên của bạn] - [Số điện thoại]</p>
                            </div>
                            <p class="text-xs text-gray-600 mt-2">* Sau khi chuyển khoản, vui lòng gửi ảnh bill cho chúng tôi qua số điện thoại để xác nhận.</p>
                        </div>
                        
                        <div id="momo-info" class="hidden mt-4 p-4 border rounded-xl bg-pink-50">
                            <h4 class="font-semibold mb-2">Thanh toán MoMo</h4>
                            <p class="text-sm text-gray-700 mb-2">Quét mã QR hoặc chuyển khoản đến số MoMo:</p>
                            <div class="bg-white p-3 rounded border text-sm text-center">
                                <p><strong>Số MoMo:</strong> 0123 456 789</p>
                                <p><strong>Chủ tài khoản:</strong> SNEAKERHUB</p>
                                <p class="mt-2 text-xs text-gray-600">* Gửi ảnh bill sau khi thanh toán</p>
                            </div>
                        </div>
                        
                        <div id="installment-info" class="hidden mt-4 p-4 border rounded-xl bg-green-50">
                            <h4 class="font-semibold mb-2">Điều kiện thanh toán trả sau</h4>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>• Thanh toán trong vòng 30 ngày kể từ ngày nhận hàng</li>
                                <li>• Phí dịch vụ: 2% trên tổng giá trị đơn hàng</li>
                                <li>• Áp dụng cho đơn hàng từ 500.000₫ trở lên</li>
                                <li>• Cần xác minh thông tin cá nhân</li>
                            </ul>
                        </div>
                    </div>
                    
                    <button type="submit" class="mt-8 w-full bg-indigo-600 text-white py-4 rounded-xl font-bold text-lg hover:bg-indigo-700 transition shadow-lg">
                        Xác nhận Đặt Hàng
                    </button>
                </form>
            </div>

            <div class="lg:w-1/3">
                <div class="bg-gray-900 text-white p-6 rounded-2xl shadow-sm sticky top-6">
                    <h3 class="text-xl font-bold mb-4 border-b border-gray-700 pb-4">Đơn hàng của bạn</h3>
                    
                    <div class="space-y-4 mb-4 border-b border-gray-700 pb-4 text-sm">
                        @php $total = 0; @endphp
                        @foreach($cart as $details)
                            @php $total += $details['price'] * $details['quantity']; @endphp
                            <div class="flex justify-between">
                                <span class="text-gray-300">{{ $details['name'] }} <b class="text-white">x{{ $details['quantity'] }}</b></span>
                                <span>{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}₫</span>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="flex justify-between text-xl font-bold">
                        <span>Tổng cộng:</span>
                        <span class="text-indigo-400">{{ number_format($total, 0, ',', '.') }}₫</span>
                    </div>
                </div>
            </div>

        </div>
    <script>
        // Toggle payment method info
        document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
            radio.addEventListener('change', function() {
                // Hide all info sections
                document.getElementById('bank-info').classList.add('hidden');
                document.getElementById('momo-info').classList.add('hidden');
                document.getElementById('installment-info').classList.add('hidden');
                
                // Show selected info section
                if (this.value === 'bank') {
                    document.getElementById('bank-info').classList.remove('hidden');
                } else if (this.value === 'momo') {
                    document.getElementById('momo-info').classList.remove('hidden');
                } else if (this.value === 'installment') {
                    document.getElementById('installment-info').classList.remove('hidden');
                }
            });
        });
    </script>
</body>
</html>