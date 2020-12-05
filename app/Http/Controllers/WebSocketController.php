<?php

namespace App\Http\Controllers;

use App\WebSocketServices\WsAuthenticationService;
use App\WebSocketServices\WsMessageService;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use ReflectionClass;

class WebSocketController extends Controller implements MessageComponentInterface
{
    private $connections = [];
    public static $users = [];

    /**
     * Listen event on open websocket connection
     * @param ConnectionInterface $conn
     * @return void
     */
    function onOpen(ConnectionInterface $conn)
    {
        $this->connections[$conn->resourceId] = compact('conn') + ['user_id' => null];
    }

    /**
     * Listen and issues event on close websocket connection
     * @param ConnectionInterface $conn
     * @return void
     */
    function onClose(ConnectionInterface $conn)
    {
        $disconnectedId = $conn->resourceId;
        WsAuthenticationService::removeUser($disconnectedId);
        unset($this->connections[$disconnectedId]);
        $msgService = new WsMessageService();
        $msgService->notifyAllUsers($this->connections, 'WebSocketUserConn', WebSocketController::$users);
    }

    /**
     * Listen and issues event on get error in websocket connection
     * @param ConnectionInterface $conn
     * @param Exception $e
     * @return void
     */
    function onError(ConnectionInterface $conn, \Exception $e)
    {
        $userId = $this->connections[$conn->resourceId]['user_id'];
        echo "An error has occurred with user $userId: {$e->getMessage()}\n";
        unset($this->connections[$conn->resourceId]);
        $conn->close();
    }

    /**
     * Listen and issues event on get messages in the websocket connection
     * @param ConnectionInterface $conn
     * @param mixed $content
     * @return void
     */
    function onMessage(ConnectionInterface $conn, $content)
    {
        $content = json_decode($content, true);
        $serverClass = new ReflectionClass($content['class']);
        $classMethod = $serverClass->getMethod($content['method']);
        if ($content['params']) {
            $classMethod->invoke(
                $serverClass->newInstance(),
                $this->connections,
                $conn->resourceId,
                $content['element'],
                $content['params']
            );
        } else {
            $classMethod->invoke(
                $serverClass->newInstance(),
                $this->connections,
                $conn->resourceId,
                $content['element']
            );
        }
    }
}
