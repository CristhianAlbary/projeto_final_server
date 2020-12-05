<?php

namespace App\Services;

use Illuminate\Support\Facades\App;

class TaskReportService
{

    protected $resourceId;
    protected $element;

    public function __construct($resourceId, $element)
    {
        $this->resourceId = $resourceId;
        $this->element = $element;
    }

}