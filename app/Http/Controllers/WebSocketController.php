<?php

namespace App\Http\Controllers;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use ReflectionClass;

class WebSocketController extends Controller implements MessageComponentInterface
{
    private $connections = [];

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
        unset($this->connections[$disconnectedId]);
        foreach ($this->connections as &$connection)
            $connection['conn']->send(json_encode([
                'offline_user' => $disconnectedId,
                'from_user_id' => 'server control',
                'from_resource_id' => null
            ]));
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
