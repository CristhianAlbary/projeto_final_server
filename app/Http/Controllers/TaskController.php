<?php

namespace App\Http\Controllers;

use App\Models\Entity\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Storage;
use WebSocket\Client as WsClient;

class TaskController extends Controller
{

    protected $taskService;

    public function __construct()
    {
        $this->taskService = new TaskService();
    }

    /**
     * Redireciona os dados para a função de validação e armazenamento
     * do objeto no banco de dados
     * @param Request $request
     * @return Task
     */
    public function store(Request $request)
    {
        return $this->taskService->store($request->all());
    }

    /**
     * Redireciona os dados para a função de validação, alteração de dados
     * @param Request $request
     * @return Task
     */
    public function update(Request $request)
    {
        return $this->taskService->update($request->all());
    }

    /**
     * Redireciona para a função de buscar todos no serviço de tarefas.
     * @return mixed
     */
    public function findAll()
    {
        return $this->taskService->findAll();
    }

    /**
     * Redireciona para a função de buscar uma tarefa por id no serviço de tarefas.
     * @param mixed $id
     * @return Task
     */
    public function findById($id)
    {
        return $this->taskService->findById($id);
    }

    /**
     * Redireciona para a função de buscar as tarefas relacionadas a um cliente.
     * @param mixed $id
     * @return mixed
     */
    public function findByUser($id)
    {
        return $this->taskService->findByUser($id);
    }

    /**
     * Gera um relatório de todas as tarefas em aberto para um determinado cliente.
     * @param $task
     * @return mixed
     */
    public function report($id, $resourceId, $element)
    {
        $task = Task::find($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('report.report-task', compact('task'))
        ->setPaper('a4', 'landscape');
        $pdfFile = $pdf->download()->getOriginalContent();
        Storage::put('public/report/' . "$task->id" . '.pdf',$pdfFile);
        $client = new WsClient("ws:/localhost:8015");
        $client->send(json_encode(['class' => "App\\WebSocketServices\\WsMessageService", 'method' => 'messageServerToUser', 'element' => $element, 'params' => ['resourceId' => $resourceId, 'data' => $task->id]]));
    }

    public function getPdf($id)
    {
        return response()->download(storage_path('app/public/report/' . $id . '.pdf'));
    }

}
