<?php

namespace App\WebSocketServices;

use App\Http\Controllers\WebSocketController;
use App\Models\Entity\User;
use Illuminate\Support\Facades\Session;

class WsAuthenticationService
{
    /**
     * @var WsMessageService $wsMessageService
     */
    protected $wsMessageService;

    public function __construct()
    {
        $this->wsMessageService = new WsMessageService();
    }

    /**
     * verify if the user already logged in, and if true close connection and logout old session,
     * after put new session in current connection.
     * @param array $connections
     * @param string $resourceId
     * @param string $element
     * @param string $userId
     * @return void
     */
    public function authUser($connections, $resourceId, $element, $userId)
    {
        $oldSession = json_decode(Session::get('user_' . $userId));
        Session::put('user_' . $userId, json_encode(['resourceId' => $resourceId, 'userId' => $userId]));
        $user = User::find((int) $userId);
        $user['conn'] = $resourceId;
        array_push(WebSocketController::$users, $user);
        foreach ($connections as $connection) {
            if ($oldSession && $connection['conn']->resourceId == $oldSession->resourceId) {
                $connection['conn']->close();
            }
        }
        $this->wsMessageService->notifyAllUsers($connections, $element, WebSocketController::$users);
    }

    /**
     * remove user from online users array
     * @param integer $connId
     * @return void
     */
    public static function removeUser($connId)
    {
        foreach (WebSocketController::$users as $key => $value) {
            if ($value['conn'] == $connId) {
                unset(WebSocketController::$users[$key]);
            }
        }
        WebSocketController::$users = array_values(WebSocketController::$users);
    }
}
