<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TaskStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\Vehicle;
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

    protected function getFormData(Task $task)
    {
        return (object)[
            // user_options => one of Admins
            //  - id, name => use AdminService to get options
            'user_options' => $this->adminService->getOptions($task->admin_id),
            // vehicle_id options => one of Vehicles
            //  - id, name => use AdminService to get vehicle options
            'vehicle_options' => Vehicle::all()->map(function ($vehicle) use ($task) {
                return (object)[
                    'value' => $vehicle->id,
                    'title' => $vehicle->title,
                    'selected' => $vehicle->id == $task->vehicle_id ? 'selected="selected"' : '',
                ];
            }),
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->validated());

        return redirect()
            ->route('admin.tasks.index')
            ->with('success', trans('admin.saved'));
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

        return redirect()
            ->route('admin.tasks.index')
            ->with('success', trans('admin.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('admin.tasks.index')
            ->with('success', trans('admin.record_deleted'));
    }

    // Assign task to admin
    public function assign(Task $task)
    {
        $task->admin_id = \Auth::guard('admin')->id();
        $task->save();

        return redirect()->route('admin.dashboard')->with('success', trans('admin.task_assigned_success'));
    }

    // reorder tasks
    public function reorder(Request $request)
    {
        // check if request has 'id' and 'status'
        $request->validate([
            'id' => 'required|integer|exists:tasks,id',
            'status' => 'required|in:' . implode(',', TaskStatusEnum::values()),
        ]);


        $task = Task::find($request->input('id'));
        $task->status = $request->input('status');
        $task->save();
        return response()->json(['success' => true, 'message' => trans('admin.task_reordered_success')]);
    }
}
