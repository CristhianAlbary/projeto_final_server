<?php

namespace App\Jobs;

use App\Http\Controllers\TaskController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TaskReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $resourceId;
    protected $element;
    protected $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($resourceId, $element, $id)
    {
        $this->resourceId = $resourceId;
        $this->element = $element;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $teste = new TaskController();
        $teste->report($this->id, $this->resourceId, $this->element);
    }
}
