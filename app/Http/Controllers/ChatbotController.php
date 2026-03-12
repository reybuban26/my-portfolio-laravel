<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        Log::info('--- Chatbot Request Started on Render ---');
        
        $request->validate([
            'message' => 'required|string',
            'history' => 'nullable|array',
        ]);

        $userMessage = $request->input('message');
        $history = $request->input('history', []);

        // Define the System Prompt about Rey Buban
        $systemPrompt = <<<PROMPT
You are the official AI Assistant for Rey Buban's Portfolio website. 
Your job is to answer questions about Rey's skills, experience, and projects professionally, concisely, and with a friendly tone.

Here is the information about Rey:
Name: Rey Buban
Age: 21
Birthdate: June 16 2004
Birth Place: Quezon City
Title: AI Developer
Experience: 
- Working at Synermaxx starting January 22, 2025.
- Completed OJT (9 hrs/day for 3 months).

Skills & Technologies:
- Languages: Python, PHP, JavaScript, Visual Basic
- Frameworks/Libraries: Laravel, Vue, CSS
- Databases/Tools: MySQL, XAMPP
- Specializations: Artificial Intelligence, AI-like chatbots (e-commerce AI search), eKYC backend/frontend integration.

Education:
- Graduated Bachelor of Science in Information Technology at Gardner College Diliman
- Graduated ICT strand at Electron College in Senior High
- Graduated at New Era High School & Elementary School

Projects:
- Maxx E-Commerce Platform (AI Search, app123.maxxweb.biz)
- Maxx AI Chat bots (app130.maxxweb.biz, app119.maxxweb.biz, app89.maxxweb.biz, app110.maxxweb.biz)
- Maxx eKYC System (app133.maxxweb.biz)

Instructions:
- If a user asks a technical question related to his skills, provide a helpful answer and mention that Rey is proficient in this area.
- If they ask for his resume/contact, tell them they can use the links provided on the website.
- Do not make up information about Rey that is not listed here.
- Keep your responses relatively short (1-3 small paragraphs maximum).
- Adopt a slightly futuristic, "AI-themed" persona, but remain highly professional.

Contact:
-Facebook: https://www.facebook.com/reybuban11
-Instagram: https://www.instagram.com/reybuban11/
-Gmail: reybuban11@gmail.com, r.buban@synermaxx.com
PROMPT;

        $messages = [
            ['role' => 'system', 'content' => $systemPrompt]
        ];

        foreach ($history as $msg) {
            if (isset($msg['role']) && isset($msg['content'])) {
                $messages[] = ['role' => $msg['role'], 'content' => $msg['content']];
            }
        }

        $messages[] = ['role' => 'user', 'content' => $userMessage];

        try {
            $rawKey = config('services.dashscope.key') ?: env('DASHSCOPE_API_KEY');
            
            // ANG BULLETPROOF SANITIZER:
            // Tatanggalin nito KAHIT ANONG invisible space, quote, o weird character.
            // Letters, numbers, at dash (-) lang ang matitira.
            $apiKey = preg_replace('/[^a-zA-Z0-9-]/', '', $rawKey);
            
            if (!$apiKey) {
                Log::error('API KEY MISSING IN RENDER ENVIRONMENT VARIABLES');
                return response()->json(['error' => 'API Key is missing.'], 500);
            }

            Log::info('Sending request to DashScope...');

            $response = Http::withHeaders([
                'Authorization' => "Bearer {$apiKey}",
                'Content-Type' => 'application/json',
            ])->timeout(30)->post('https://dashscope-intl.aliyuncs.com/compatible-mode/v1/chat/completions', [
                'model' => 'qwen3.5-plus',
                'messages' => $messages,
            ]);

            Log::info('DashScope Status: ' . $response->status());

            if ($response->successful()) {
                // ... (Hayaan mo lang yung existing na code mo rito para sa success at ElevenLabs)
                $data = $response->json();
                
                if (isset($data['choices'][0]['message']['content'])) {
                    $reply = $data['choices'][0]['message']['content'];

                    $rawElevenKey = config('services.elevenlabs.key') ?: env('ELEVENLABS_API_KEY');
                    $elevenLabsKey = preg_replace('/[^a-zA-Z0-9-]/', '', $rawElevenKey);
                    $audioBase64 = null;

                    if ($elevenLabsKey) {
                        try {
                            $elevenResponse = Http::withHeaders([
                                'xi-api-key' => $elevenLabsKey,
                                'Content-Type' => 'application/json',
                            ])->timeout(30)->post("https://api.elevenlabs.io/v1/text-to-speech/hpp4J3VqNfWAUOO0d1Us?output_format=mp3_44100_128", [
                                'text' => $reply,
                                'model_id' => 'eleven_multilingual_v2',
                            ]);
                            
                            if ($elevenResponse->successful()) {
                                $audioBase64 = base64_encode($elevenResponse->body());
                            } else {
                                Log::error('ElevenLabs API Error', ['response' => $elevenResponse->body()]);
                            }
                        } catch (\Exception $e) {
                            Log::error('ElevenLabs Exception', ['message' => $e->getMessage()]);
                        }
                    }
                    
                    Log::info('Chatbot request completed successfully.');
                    return response()->json([
                        'reply' => $reply, 
                        'audio' => $audioBase64
                    ]);

                } else {
                    return response()->json(['error' => 'Code Logic Error: Unexpected DashScope response format.'], 500);
                }
            } else {
                // ANG TRUTH TELLER:
                $keyLength = strlen($apiKey);
                $first4 = substr($apiKey, 0, 4);
                $last4 = substr($apiKey, -4);
                
                return response()->json([
                    'error' => "DASHSCOPE 401 REJECT. Render is using Key: {$first4}...{$last4} (Total Length: {$keyLength}). Alibaba says: " . $response->body()
                ], 500);
            }

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'LARAVEL CRASHED: ' . $e->getMessage() . ' (Line ' . $e->getLine() . ')'
            ], 500);
        }
    }
}
