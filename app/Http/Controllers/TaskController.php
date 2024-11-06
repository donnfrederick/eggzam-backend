<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Traits\ApiResponseTrait;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use ApiResponseTrait;
    
    public function index(string $status): JsonResponse
    {
        if ($status == "all") {
            $result = Task::get();
        } else {
            $result = Task::where('status', $status)->get();
        }

        return $this->apiResponse(
            200,
            "List of tasks by status",
            $result
        );
    }

    public function save(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string|in:Pending,Completed'
        ]);

        // Create a new task
        $task = Task::create(array_merge($validatedData, [
            'status' => $validatedData['status'] ?? 'Pending'
        ]));

        $task = Task::find($task->id);

        return $this->apiResponse(
            200,
            "Task created successfully",
            $task
        );
    }
    
    public function update(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'id' => 'required|int',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string|in:Pending,Completed'
        ]);

        // Edit task
        $Task = Task::find($validatedData['id']);
        $Task->title = $validatedData['title'];
        $Task->description = $validatedData['description'];
        $Task->status = $validatedData['status'];

        if ($Task->save()) {
            return $this->apiResponse(
                200,
                "Task created successfully",
                []
            );
        } else {
            return $this->apiResponse(
                500,
                "An error occurred",
                []
            );
        }
    }
    
    public function destroy(Request $request): JsonResponse
    {
        $taskIds = $request->query('deleteIds');

        if (!$taskIds) {
            return $this->apiResponse(
                400,
                "No task IDs provided",
                []
            );
        }

        $taskIds = json_decode($taskIds, true);

        // Perform the delete operation
        Task::whereIn('id', $taskIds)->delete();

        return $this->apiResponse(
            200,
            "Task(s) deleted successfully",
            []
        );
    }

    public function updateStatus(int $id, string $status): JsonResponse
    {
        $Task = Task::find($id);

        $Task->status = ucfirst($status);

        if ($Task->save()) {
            return $this->apiResponse(
                200,
                "Changes have been saved",
                $Task
            );
        } else {
            return $this->apiResponse(
                500,
                "An error occurred",
                []
            );
        }
    }
}
