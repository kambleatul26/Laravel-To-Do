<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Models\Task;
use App\Models\Shared;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShareController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function share($id)
    {
        $task = Task::find($id);
        return view('shared.share')->with('task', $task);
    }

    public function shareTo(Request $request, $id)
    {
        // Validate The Data
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        // Find the related task
        $shared = new Shared;

        // Assign the Task data from our request
        $shared->task_id = $id;
        $shared->email = $request->email;

        // Save the task
        $shared->save();

        // Flash Session Message with Success
        Session::flash('success', 'Shared The Task Successfully');

        // Return A Redirect
        return redirect()->route('task.index');
    }

    public function showShared() {

        $sharedTasks = DB::table('shared')->join('tasks', 'shared.task_id', '=', 'tasks.id')->where('email','=', Auth::user()->email)->paginate();
        // dump($sharedTasks);

        // $tasks = Task::

        return view('shared.showShared')->with('sharedTasks', $sharedTasks);
    }
}
