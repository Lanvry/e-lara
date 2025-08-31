<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function generate(Request $request)
    {
        $apiKey = env('API_KEY');
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}";

        // Ambil langsung contents dari frontend
        $contents = $request->input('contents', []);

        $response = Http::post($url, [
            "contents" => $contents,
            "generationConfig" => [
                "temperature" => 0.7,
                "topP" => 0.8,
                "topK" => 40,
                "maxOutputTokens" => 1024
            ],
            "safetySettings" => [
                [
                    "category" => "HARM_CATEGORY_DANGEROUS_CONTENT",
                    "threshold" => "BLOCK_ONLY_HIGH"
                ]
            ]
        ]);

        if ($response->failed()) {
            return response()->json([
                'error' => true,
                'message' => $response->body(),
            ], $response->status());
        }

        return $response->json();
    }
}
