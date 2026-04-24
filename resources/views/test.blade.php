<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-center mb-8">Test Page</h1>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold mb-4">System Status</h2>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span>PHP Version:</span>
                    <span class="font-mono bg-gray-100 px-2 py-1 rounded"><?php echo phpversion(); ?></span>
                </div>
                <div class="flex justify-between items-center">
                    <span>Laravel Version:</span>
                    <span class="font-mono bg-gray-100 px-2 py-1 rounded"><?php echo app()->version(); ?></span>
                </div>
                <div class="flex justify-between items-center">
                    <span>Database:</span>
                    <span class="font-mono bg-gray-100 px-2 py-1 rounded">
                        <?php
                        try {
                            DB::connection()->getPdo();
                            echo 'Connected';
                        } catch (\Exception $e) {
                            echo 'Error: ' . $e->getMessage();
                        }
                        ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold mb-4">Quick Links</h2>
            <div class="grid md:grid-cols-2 gap-4">
                <a href="/" class="bg-blue-500 text-white text-center py-3 rounded hover:bg-blue-600">Trang chủ</a>
                <a href="/admin" class="bg-purple-500 text-white text-center py-3 rounded hover:bg-purple-600">Admin Dashboard</a>
                <a href="/chat" class="bg-green-500 text-white text-center py-3 rounded hover:bg-green-600">Chat AI</a>
                <a href="/login" class="bg-yellow-500 text-white text-center py-3 rounded hover:bg-yellow-600">Đăng nhập</a>
            </div>
        </div>
    </div>
</body>
</html>