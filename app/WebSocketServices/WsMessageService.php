<?php

namespace App\WebSocketServices;

class WsMessageService
{
    /**
     * notify all users with generic messages or objects
     * @param array $connections
     * @param String $element
     * @param mixed $content
     * @return void
     */
    public function notifyAllUsers($connections, $element, $content)
    {
        $count = 0;
        foreach ($connections as $connection)
            $connection['conn']->send(json_encode([
                'element' => $element,
                'content' => $content,
                'count' => $count
            ]));
            $count = $count + 1;
    }

    /**
     * notify pnly one user with generic messages or objects
     * @param array $connections
     * @param string $resourceId
     * @param string $element
     * @param mixed $content
     * @return void
     */
    public function notifyUser($connections, $resourceId, $element, $content)
    {
        $connections[$resourceId]['conn']->send(
            json_encode([
                'element' => $element,
                'content' => $content,
            ])
        );
    }
}
