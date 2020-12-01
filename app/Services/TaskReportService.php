<?php

namespace App\Services;

class TaskReportService extends JobNotification
{

    protected $resourceId;
    protected $element;

    public function __construct($resourceId, $element)
    {
        $this->resourceId = $resourceId;
        $this->element = $element;
    }

    /**
     * Gera um relatório de todas as tarefas em aberto para um determinado cliente.
     * @param int $usuDestino
     * @return mixed
     */
    public function report($usuDestino)
    {
        $tasks = Task::where('status', 'A')->get();
        foreach($tasks as $task) {
            $task->load('userDestino');
        }
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('report.report-task', compact('tasks'))
        ->setPaper('a4', 'landscape');
        return $pdf->download();
    }

}