<?php

namespace App\Http\Controllers;

use App\Services\ChatMessageService;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    protected $chatMessageService;

    public function __construct()
    {
        $this->chatMessageService = new ChatMessageService();
    }

    public function getConversation($idOrigin, $idDest)
    {
        return $this->chatMessageService->findConversation($idOrigin, $idDest);
    }
}
