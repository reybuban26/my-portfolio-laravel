<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'history' => 'nullable|array',
        ]);

        $userMessage = $request->input('message');
        $history = $request->input('history', []);

        $systemPrompt = <<<PROMPT
You are the official AI Assistant for Rey Buban's Portfolio website. 
Your job is to answer questions about Rey's skills, experience, and projects professionally, concisely, and with a friendly tone.

Here is the information about Rey:
Full Name: Rey Romano Buban
Age: 21
GirlFriend: Stephanie Martinez Arguilles
Birthdate: June 16 2004
Birth Place: Quezon City
Title: AI Developer
Work Company: Synermaxx Corporation
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
- Maxx AI Chat bots with WEBRTC (app141.maxxweb.biz)

Instructions:
- STRICT RULE: You must ALWAYS respond in English, regardless of the language the user uses. If the user speaks in Tagalog or any other language, acknowledge it but reply in fluent, polite English.
- If a user asks a technical question related to his skills, provide a helpful answer and mention that Rey is proficient in this area.
- If they ask for his resume/contact, tell them they can use the links provided on the website.
- Do not make up information about Rey that is not listed here.
- Keep your responses relatively short (1-3 small paragraphs maximum).
- Adopt a slightly futuristic, "AI-themed" persona, but remain highly professional.

Contact:
-Facebook: Rey Romano Buban 
-Instagram: reybuban11
-Gmail: reybuban11@gmail.com
-Company Email: r.buban@synermaxx.com
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
            $apiKey = env('GROQ_API_KEY'); 
            
            if (!$apiKey) {
                return response()->json(['error' => 'API Key is missing.'], 500);
            }

            $response = Http::withHeaders([
                'Authorization' => "Bearer {$apiKey}",
                'Content-Type' => 'application/json',
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => 'llama-3.1-8b-instant',
                'messages' => $messages,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['choices'][0]['message']['content'])) {
                    $reply = $data['choices'][0]['message']['content'];
                    return response()->json([
                        'reply' => $reply
                    ]);
                }
            }

            Log::error('API Error', ['response' => $response->body()]);
            return response()->json(['error' => 'Failed to generate response. Please try again later.'], 500);

        } catch (\Exception $e) {
            Log::error('Chatbot Exception', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }
}
