<?php

namespace Ellllllen\Http\Controllers;

use Ellllllen\ChatBot\Contracts\InitiateChatbotInterface;

class ChatController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadChatWindow()
    {
        return view('chat.chat-window');
    }

    public function chat(InitiateChatbotInterface $initiateChatbot)
    {
        return $initiateChatbot->startConversation();
    }
}