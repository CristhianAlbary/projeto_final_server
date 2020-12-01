<?php

namespace App\Services;

use App\Models\Entity\Message;
use App\WebSocketServices\WsMessageService;

class ChatMessageService
{

    protected $message;

    public function __construct()
    {
        $this->message = new Message();
    }

    /**
     * Armazena a mensagem envida entre um usuário e um suporte ou de um suporte para um usuário
     * @param array $connections
     * @param String $element
     * @param mixed $content
     * @return void
     */
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

    /**
     * Busca todas as menssagens no banco de dados.
     * @return mixed
     */
    public function findAll()
    {
        $messages = $this->message->all();
        return response()->json(['data' => $messages, 'success' => true, 'state' => 200]);
    }

    /**
     * Busca uma mensagem no banco de dados por id
     * @param int $id
     * @return Message
     */
    public function findById($id)
    {
        $message = $this->message->find($id);
        return response()->json(['data' => $message, 'success' => true, 'state' => 200]);
    }

    /**
     * Busca todas as mensagens que um usuário enviou.
     * @param int $id
     * @return mixed
     */
    public function findByUserSend($userId)
    {
        $messages = $this->message->where('usu_origem', $userId)->orderby('created_at', 'desc')->get();
        return response()->json(['data' => $messages, 'success' => true, 'state' => 200]);
    }

    /**
     * Busca todas as mensagens que um usuário recebeu
     * @param int $userId
     * @return mixed
     */
    public function findByUserReceive($userId)
    {
        $messages = $this->message->where('usu_destino', $userId)->orderby('created_at', 'desc')->get();
        return response()->json(['data' => $messages, 'success' => true, 'state' => 200]);
    }

    /**
     * Busca todas as mensagens que um usuário enviou para outro usuário.
     * @param int $id
     * @return mixed
     */
    public function findConversation($userOriginId, $userDestId)
    {
        $messages = $this->message->where('usu_origem', $userOriginId)->where('usu_destino', $userDestId)->orderby('created_at', 'desc')->get();
        return response()->json(['data' => $messages, 'success' => true, 'state' => 200]);
    }

}