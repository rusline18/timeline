<?php

namespace App\Http\Controllers;

use App\Projects;
use App\component\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Проекты
     *
     * @return View
     */
    public function index()
    {
        $projects = Projects::all();
        return view('projects', [
            'projects' => $projects,
        ]);
    }

    /**
     * Создание проекта
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $project = new Projects();
        $project->fill($request->all());

        return $project->save()
            ? JsonResponse::response(false, ['name' => $project->name, 'id' => $project->id])
            : JsonResponse::response(true, 'Произошла ошибка');
    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {

    }

}
