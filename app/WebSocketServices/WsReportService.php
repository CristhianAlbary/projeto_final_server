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
    public function startreportJob($connections, $resourceId, $element, $usuDestino)
    {
        if($connections && $usuDestino)
            TaskReportJob::dispatch($resourceId, $element, $usuDestino)->onQueue('reports');
    }

}