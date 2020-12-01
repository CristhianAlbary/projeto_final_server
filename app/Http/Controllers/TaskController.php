<?php

namespace App\Http\Controllers;

use App\Models\Entity\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;
use App;

class TaskController extends Controller
{

    protected $taskService;

    public function __construct()
    {
        $this->taskService = new TaskService();
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
        return $pdf->stream();
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
     * Redireciona para a função de buscar uma tarefa por parametro no serviço de tarefas.
     * @param mixed $params
     * @return mixed
     */
    public function findByParam($params)
    {
    }
}
