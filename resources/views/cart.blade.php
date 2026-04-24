<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng của bạn - SneakerHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-3xl font-extrabold text-indigo-600 tracking-tighter">SNEAKER<span class="text-gray-800">HUB</span></a>
            <a href="/" class="text-gray-600 hover:text-indigo-600 font-medium"><i class="fas fa-arrow-left mr-2"></i>Tiếp tục mua sắm</a>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold mb-8">Giỏ hàng của bạn</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 font-semibold shadow-sm">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded-lg mb-6 font-semibold shadow-sm">
                {{ session('error') }}
            </div>
        @endif

        @if(session('cart') && count(session('cart')) > 0)
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-2/3 bg-white rounded-2xl shadow-sm p-6">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-gray-400 border-b pb-4">
                                <th class="pb-4 font-medium">Sản phẩm</th>
                                <th class="pb-4 font-medium">Đơn giá</th>
                                <th class="pb-4 font-medium">Số lượng</th>
                                <th class="pb-4 font-medium">Tổng</th>
                                <th class="pb-4 font-medium"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity']; @endphp
                                <tr class="border-b last:border-0 hover:bg-gray-50 transition">
                                    <td class="py-4 flex items-center gap-4">
                                        <img src="{{ $details['image'] }}" class="w-20 h-20 rounded-xl object-cover shadow-sm">
                                        <span class="font-bold text-gray-800 text-lg">{{ $details['name'] }}</span>
                                    </td>
                                    <td class="py-4 text-gray-600 font-medium">{{ number_format($details['price'], 0, ',', '.') }}₫</td>
                                    <td class="py-4">
                                        <span class="bg-gray-100 px-4 py-2 rounded-lg font-bold">{{ $details['quantity'] }}</span>
                                    </td>
                                    <td class="py-4 font-bold text-rose-600">{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}₫</td>
                                    <td class="py-4 text-right">
                                        <a href="{{ route('cart.remove', $id) }}" class="text-red-400 hover:text-red-600 transition p-2">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="lg:w-1/3">
                    <div class="bg-white rounded-2xl shadow-sm p-6 sticky top-24">
                        <h3 class="text-xl font-bold mb-6 border-b pb-4">Tóm tắt đơn hàng</h3>
                        <div class="flex justify-between mb-4 text-gray-600">
                            <span>Tạm tính</span>
                            <span class="font-semibold">{{ number_format($total, 0, ',', '.') }}₫</span>
                        </div>
                        <div class="flex justify-between mb-6 text-gray-600 border-b pb-6">
                            <span>Phí giao hàng</span>
                            <span class="font-semibold text-green-600">Miễn phí</span>
                        </div>
                        <div class="flex justify-between mb-8">
                            <span class="text-xl font-bold">Tổng cộng</span>
                            <span class="text-2xl font-extrabold text-rose-600">{{ number_format($total, 0, ',', '.') }}₫</span>
                        </div>
                        <a href="{{ route('checkout.index') }}" class="block text-center w-full bg-indigo-600 text-white py-4 rounded-xl font-bold text-lg hover:bg-indigo-700 transition shadow-lg">
                            Tiến hành Thanh toán
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-2xl shadow-sm">
                <i class="fas fa-shopping-basket text-6xl text-gray-200 mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Giỏ hàng trống</h3>
                <p class="text-gray-500 mb-6">Bạn chưa chọn sản phẩm nào vào giỏ hàng.</p>
                <a href="/" class="bg-gray-900 text-white px-8 py-3 rounded-full font-bold hover:bg-indigo-600 transition">Mua sắm ngay</a>
            </div>
        @endif
    </main>
</body>
</html>