<?php

namespace App\WebSocketServices;

use App\Jobs\TaskReportJob;

class WsReportService
{

    /**
     * Solicita o relatório no formato pdf para um job
     * @param array $connections
     * @param integer $resourceId
     * @param string $element
     * @param integer $usuDestino
     * @return void
     */
    public function startreportJob($connections, $resourceId, $element, $id)
    {
        if ($connections && $id) {
            TaskReportJob::dispatch($resourceId, $element, $id);
            $notify = new WsMessageService();
            $notify->notifyUser($connections, $resourceId, $element, $id);
        }
    }
}
