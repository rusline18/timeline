<?php


namespace App\Http\Controllers;


use App\component\JsonResponse;
use App\Http\Requests\TaskCreate;
use App\Tasks;
use App\Times;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TaskController extends Controller
{

    /**
     * Создание задачи
     * @param TaskCreate $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(TaskCreate $request)
    {
        $task = new Tasks();
        $task->project_id = $request->input('project');
        $task->fill($request->all());

        return $task->save()
            ? JsonResponse::response(false, ['id' => $task->id, 'name' => $task->name])
            : JsonResponse::response(true, 'Произошла ошибка');
    }

    /**
     * Начать выполнение задачи
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function start($id)
    {
        /** @var Tasks $task */
        $task = Tasks::find($id);
        if (!$task) {
            return JsonResponse::response(true, 'Нет такой задачи');
        }

        /** @var $timeTask Times */
        $timeTask = $task->isStart(false);

        if ($timeTask) {
            return JsonResponse::response(false, 'Вы уже начали выполнять задачу ' . $timeTask->text);
        }

        /** @var Times $timeTask */
        $timeTask = new Times();

        $timeTask->task_id = $task->id;

        return $timeTask->save()
            ? JsonResponse::response(false, 'Задача начата')
            : JsonResponse::response(true, 'Произошла ошибка');
    }

    public function stop($id)
    {

    }
}
