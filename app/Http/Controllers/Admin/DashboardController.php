<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Enums\TaskStatusEnum;
use App\Models\Task;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard with tasks grouped by status.
     */
    public function index()
    {
        // select all tasks group by status and order by created_at desc
        // filter tasks (Done and Cancelled) to only show those updated in last 2 weeks
        return view('admin.dashboard', [
            'statuses' => TaskStatusEnum::cases(),
            'tasksByStatus' => collect(TaskStatusEnum::cases())->mapWithKeys(function ($status) {
                $query = Task::with('admin')
                    ->where('status', $status->value)
                    ->orderBy('created_at', 'desc');

                // For COMPLETED and CANCELLED, filter to last 2 weeks
                if (in_array($status, [TaskStatusEnum::COMPLETED, TaskStatusEnum::CANCELLED])) {
                    $query->where('updated_at', '>=', now()->subWeeks(2));
                }

                return [$status->value => $query->get()];
            }),
        ]);


//        return view('admin.dashboard', [
//            'statuses' => TaskStatusEnum::cases(),
//            'tasksByStatus' => collect(TaskStatusEnum::cases())->mapWithKeys(function ($status) {
//                return [$status->value => Task::with('admin')
//                    ->where('status', $status->value)
//                    ->orderBy('created_at', 'desc')
//                    ->get()];
//            }),
//        ]);


//        // Get enum cases in defined order
//        $statuses = TaskStatusEnum::cases();
//
//        // Extract string keys from enum cases
//        $keys = array_map(fn($s) => $s->value, $statuses);
//
//        // Define which statuses should be limited to recent updates
//        $recentKeys = [
//            TaskStatusEnum::COMPLETED->value,
//            TaskStatusEnum::CANCELLED->value,
//        ];
//
//        // Timestamp cutoff for "recent" (2 weeks)
//        $recentFrom = now()->subWeeks(2);
//
//        // Build query: include all non-recent-limited statuses, plus recent completed/cancelled only
//        $otherKeys = array_values(array_diff($keys, $recentKeys));
//
//        $tasksQuery = Task::with('admin')->where(function ($q) use ($otherKeys, $recentKeys, $recentFrom) {
//            if (!empty($otherKeys)) {
//                $q->whereIn('status', $otherKeys);
//
//                // also include recently updated completed/cancelled
//                $q->orWhere(function ($q2) use ($recentKeys, $recentFrom) {
//                    $q2->whereIn('status', $recentKeys)
//                        ->where('updated_at', '>=', $recentFrom);
//                });
//            } else {
//                // only recent completed/cancelled statuses
//                $q->whereIn('status', $recentKeys)
//                    ->where('updated_at', '>=', $recentFrom);
//            }
//        });
//
//        $tasks = $tasksQuery->orderBy('created_at', 'desc')->get();
//
//        // Group tasks by status key, preserving order of statuses
//        $tasksByStatus = collect($keys)->mapWithKeys(fn($k) => [$k => $tasks->where('status', $k)]);
//
//        return view('admin.dashboard', compact('statuses', 'tasksByStatus'));
    }
}
