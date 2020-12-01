<?php

namespace App\Services;

use App\Models\Entity\Message;
use App\WebSocketServices\WsMessageService;

class ChatMessageService
{

    public function saveMessage($connections, $resourceId, $element, $params)
    {
        $message = new Message();
        $message->usu_origem = $params['from']['id'];
        $message->usu_destino = $params['to']['id'];
        $message->mensagem = $params['message'];
        $message->status = 'A';
        $message->save();
        $wsNotify = new WsMessageService();
        $wsNotify->notifyUser($connections, (int) $params['to']['conn'], $element, $params);
    }

}