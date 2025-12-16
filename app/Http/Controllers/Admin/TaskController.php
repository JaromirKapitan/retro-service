<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\AdminService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        // adminService
        $this->adminService = new AdminService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.task.index', [
            'list' => Task::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $task = new Task(session()->get('_old_input') ?? $request->all());

        return view('admin.task.form', [
            'model' => $task,
            'form' => $this->getFormData($task),
        ]);
    }

    protected function getFormData(Task $task){
        return (object)[
            // user_options => one of Admins
            //  - id, name => use AdminService to get options
            'user_options' => $this->adminService->getOptions($task->admin_id),
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->validated());

        return redirect()->route('admin.tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('admin.task.show', [
            'model' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('admin.task.form', [
            'model' => $task,
            'form' => $this->getFormData($task),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('admin.tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('admin.tasks.index')->with('success', 'Task deleted successfully.');
    }

    // Assign task to admin
    public function assign(Task $task)
    {
        $task->admin_id = \Auth::guard('admin')->id();
        $task->save();

        return redirect()->route('admin.dashboard')->with('success', 'Task assigned successfully.');
    }
}
