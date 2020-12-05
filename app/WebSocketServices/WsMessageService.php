<?php

namespace App\WebSocketServices;

use Illuminate\Support\Facades\Session;

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
        foreach ($connections as $connection) {
            $connection['conn']->send(json_encode([
                'element' => $element,
                'content' => $content
            ]));
        }
    }

    /**
     * notify only one user with generic messages or objects
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

    /**
     * notify only one user with generic messages or objects
     * @param array $connections
     * @param string $resourceId
     * @param string $element
     * @param mixed $content
     * @return void
     */
    public function messageServerToUser($connections, $resourceId, $element, $content) {
        $connections[$content['resourceId']]['conn']->send(
            json_encode([
                'element' => $element,
                'content' => $content['data'],
            ])
        );
    }

}
