<?php

namespace App\Jobs;

use App\Services\TaskReportService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TaskReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $taskReportService;
    protected $usuDestino;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($resourceId, $element, $usuDestino)
    {
        $this->taskReportService = new TaskReportService($resourceId, $element);
        $this->usuDestino = $usuDestino;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->taskReportService->report($this->usuDestino);
    }
}
