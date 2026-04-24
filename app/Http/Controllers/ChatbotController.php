<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    /**
     * Hiển thị trang chat
     */
    public function index()
    {
        return view("chatbot");
    }

    /**
     * Xử lý chat với Gemini API
     */
    public function chat(Request $request)
    {
        $request->validate([
            "message" => "required|string|max:1000",
        ]);

        $userMessage = $request->message;

        try {
            // Gọi Gemini API
            $response = $this->getGeminiResponse($userMessage);

            return response()->json([
                "success" => true,
                "message" => $response,
            ]);

        } catch (\Exception $e) {
            Log::error("Chatbot error: " . $e->getMessage());

            return response()->json([
                "success" => false,
                "message" => "Xin lỗi, có lỗi xảy ra. Vui lòng thử lại sau.",
            ]);
        }
    }

    /**
     * Lấy phản hồi từ Gemini API
     */
    private function getGeminiResponse($message)
    {
        $apiKey = env("GEMINI_API_KEY");

        if (!$apiKey) {
            Log::warning("Gemini API key not configured, using fallback response");
            return $this->getFallbackResponse($message);
        }

        try {
            $systemPrompt = "Bạn là trợ lý AI chăm sóc khách hàng của cửa hàng giày Cloudyy (Shop Giày Chính Hãng). Hãy trả lời bằng tiếng Việt, thân thiện, hữu ích và chuyên nghiệp. Nội dung tư vấn:
1. Các sản phẩm: giày sneaker, giày thể thao, giày công sở
2. Tư vấn kích cỡ: có các size từ 35-48
3. Giao hàng: toàn quốc, 2-3 ngày, phí 30k, miễn phí từ 1 triệu
4. Đổi trả: trong 7 ngày, nguyên tem mác
5. Liên hệ: phone/email khi cần
Hãy giúp khách hàng một cách nhiệt tình.";

            $response = Http::withHeaders([
                "Content-Type" => "application/json",
            ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent", [
                "contents" => [
                    [
                        "parts" => [
                            [
                                "text" => $systemPrompt . "\n\nCâu hỏi của khách: " . $message
                            ]
                        ]
                    ]
                ],
                "generationConfig" => [
                    "temperature" => 0.7,
                    "topK" => 40,
                    "topP" => 0.95,
                    "maxOutputTokens" => 500,
                ]
            ], [
                "key" => $apiKey
            ])->json();

            // Xử lý phản hồi
            if (isset($response["candidates"][0]["content"]["parts"][0]["text"])) {
                return $response["candidates"][0]["content"]["parts"][0]["text"];
            } else {
                Log::warning("Unexpected Gemini API response: " . json_encode($response));
                return $this->getFallbackResponse($message);
            }

        } catch (\Exception $e) {
            Log::error("Gemini API error: " . $e->getMessage());
            return $this->getFallbackResponse($message);
        }
    }

    /**
     * Phản hồi dự phòng khi API không khả dụng
     */
    private function getFallbackResponse($message)
    {
        $responses = [
            "xin chào" => "Xin chào! Tôi là trợ lý AI của Cloudyy. Tôi có thể giúp bạn tìm hiểu về các mẫu giày, tư vấn kích cỡ, hoặc trả lời câu hỏi về đặt hàng. Bạn cần hỗ trợ gì hôm nay?",
            "giá" => "Giá cả các sản phẩm giày của chúng tôi dao động từ 500.000đ đến 3.000.000đ tùy thuộc vào mẫu mã và chất liệu. Bạn có thể xem chi tiết giá trên trang sản phẩm.",
            "kích cỡ" => "Chúng tôi có các kích cỡ từ 35 đến 45 cho nữ và 39 đến 48 cho nam. Bạn có thể xem bảng kích cỡ chi tiết trên trang sản phẩm hoặc liên hệ để được tư vấn.",
            "giao hàng" => "Chúng tôi giao hàng toàn quốc trong 2-3 ngày với phí ship từ 30.000đ. Đơn hàng trên 1.000.000đ được miễn phí ship.",
            "đổi trả" => "Chúng tôi hỗ trợ đổi trả trong 7 ngày với sản phẩm còn nguyên tem mác. Bạn có thể mang đến cửa hàng hoặc gửi về qua đường bưu điện.",
            "liên hệ" => "Bạn có thể liên hệ với chúng tôi qua số điện thoại 1900-xxxx hoặc email support@cloudyy.com để được hỗ trợ tốt nhất.",
        ];

        $message = strtolower($message);

        foreach ($responses as $keyword => $response) {
            if (str_contains($message, $keyword)) {
                return $response;
            }
        }

        return "Cảm ơn bạn đã liên hệ với Cloudyy! Tôi sẽ giúp bạn tìm hiểu về sản phẩm. Bạn có thể cho tôi biết bạn đang tìm loại giày nào không?";
    }
}
