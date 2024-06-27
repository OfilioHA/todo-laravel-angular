<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Task::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $body = $request->validated();
        $task = new Task();
        $task->title = $body['title'];
        $task->description = $body['description'];
        $task->priority = $body['priority'];
        $saved = $task->save();

        if (!$saved) {
            return response()->json([
                'message' => 'Error at saving!'
            ], 422);
        }

        return response()->json([
            'message' => 'Saved successfully!',
            'task' => $task->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $body = $request->validated();
        $task->title = $body['title'];
        $task->description = $body['description'];
        $task->priority = $body['priority'];
        $task->finished_at = ($body['finished_at']) ? Carbon::now() : null;
        $saved = $task->save();

        if (!$saved) {
            return response()->json([
                'message' => 'Error at updating!'
            ], 422);
        }

        return response()->json([
            'message' => 'Updated successfully!',
            'task' => $task->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $deleted = $task->delete();

        if (!$deleted) {
            return response()->json([
                'message' => 'Error at deleteing!'
            ], 422);
        }

        return response()->json([
            'message' => 'Deleted successfully!'
        ]);
    }
}
