<?php


namespace App\Http\Controllers;


use App\Projects;
use App\Tasks;
use App\Times;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
{
    /**
     * Труднозатраты
     *
     * @param int|null $id
     * @return View
     */
    public function index($id = null)
    {
        $projects = Projects::all();
        $times = Times::all();

        if ($id) {
            $activeProject = Projects::where('id', $id)->first();
            if (!$activeProject) {
                throw new NotFoundHttpException();
            }
        } else {
            $activeProject = $projects[0];
        }

        $activeProject->tasks = $activeProject->tasks()->get();

        /** @var Times $task */
        foreach ($activeProject->tasks as $index => $task) {
            $activeProject->tasks[$index]['timesTask'] = [
                'model' => $task->times()->get(),
                'total' => $task->times()->sum('hours')
            ];
        }

        return view('home', [
            'date' => date('Y-m-d'),
            'projects' => $projects,
            'activeProject' => $activeProject,
            'times' => $times,
        ]);
    }

    /**
     * Отчеты
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function report()
    {
        return view('report');
    }
}
