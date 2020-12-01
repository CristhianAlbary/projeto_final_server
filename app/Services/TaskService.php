<?php

namespace App\Services;

use App\Models\Entity\Task;
use Illuminate\Support\Facades\DB;

class TaskService
{

    protected $task;
    protected $validator;

    public function __construct()
    {
        $this->task = new Task();
        $this->validator = new ObjectValidatorService();
    }

    /**
     * Armazena uma tarefa de chamado para resolver um determinado
     * problema de algum cliente.
     * @param mixed $data
     * @return mixed
     */
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $objectValidate = $this->validator->validate(Task::class, $data);
            if (is_bool($objectValidate) && $objectValidate) {
                $task = new Task($data);
                $task->save();
                DB::commit();
                return response()->json(['data' => $task, 'success' => true, 'state' => 200]);
            } else {
                return $objectValidate;
            }
        } catch (\Throwable $err) {
            DB::rollBack();
            throw $err;
        }
    }

    /**
     * Realiza alterações em determinados campos em tarefas de chamado
     * que já foram armazenadas no banco de dados
     * @param mixed $data
     * @return mixed
     */
    public function update($data)
    {
        if (isset($data['id'])) {
            try {
                DB::beginTransaction();
                $objectValidate = $this->validator->validate(Task::class, $data);
                if (is_bool($objectValidate) && $objectValidate) {
                    $task = Task::find($data['id']);
                    $task->descricao = $data['descricao'];
                    $task->status = $data['status'];
                    $task->save();
                    DB::commit();
                    return response()->json(['data' => $task, 'success' => true, 'state' => 200]);
                } else {
                    return $objectValidate;
                }
            } catch (\Throwable $err) {
                DB::rollBack();
                throw $err;
            }
        }
    }

    /**
     * Busca todas as tarefas de chamado que estão armazenadas no banco de dados
     * @return Task
     */
    public function findAll()
    {
        $tasks = $this->task->all();
        return response()->json(['data' => $tasks, 'success' => true, 'state' => 200]);
    }

    /**
     * Busca uma tarefa de chamado no banco de dados por id
     * @param int
     * @return Task
     */
    public function findById($id)
    {
        $task = $this->task->find($id);
        return response()->json(['data' => $task, 'success' => true, 'state' => 200]);
    }

    /**
     * Busca uma tarefa de chamado no banco de dados por parametro.
     * @param mixed $params
     * @return Task
     */
    public function findByName($params)
    {
    }
}
