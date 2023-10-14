<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Auth;

class TaskController extends Controller
{
    public function redirectIndex()
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }
        return redirect()->route('tasks.index');
    }

    public function taskIndex()
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }

        $user = Auth::user();
        $tasks = Task::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(3);

        return view('tasks.index', [
            'tasks' => $tasks,
            'user' => $user
        ]);
    }

    public function taskCreate()
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }
        $user = Auth::user();
        //dd($user);
        return view('tasks.create', ['user' => $user]);
    }

    public function taskEdit(Task $task)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    public function taskShow(Task $task)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }
        return view('tasks.show', ['task' => $task]);
    }

    public function taskStore(TaskRequest $request)
    {
        $task = Task::create($request->validated());

        return redirect()->route('tasks.index')->with('status', 'Task created!');
    }

    public function taskUpdate(Task $task, TaskRequest $request)
    {
        $task->update($request->validated());
        return redirect()->route('tasks.show', ['task' => $task->id])->with('status', 'Task Updated!');
    }

    public function taskDestroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('status', 'Task Deleted!');
    }

    public function taskComplete(Task $task)
    {
        $task->toggleComplete();
        return redirect()->route('tasks.show', ['task' => $task->id])->with('status', 'Status changed!');
    }
}
