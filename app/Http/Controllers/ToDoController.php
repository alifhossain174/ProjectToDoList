<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class ToDoController extends Controller
{
    public function toDoList(){
        $lists = ToDo::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('backend.to_do_list', compact('lists'));
    }

    public function createTask(){
        return view('backend.create_tasks');
    }

    public function saveTask(Request $request){
        $this->validate($request,[
            'title' => 'required|max:255',
        ]);

        ToDo::insert([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->ck_description,
            'status' => 0, // task not completed
            'slug' => str::random(5) . time(),
            'created_at' => Carbon::now()
        ]);

        Toastr::success('Task has Created', 'Success');
        return redirect('/my/todo/lists');
    }

    public function doneTask($slug){
        ToDo::where('slug', $slug)->update([
            'status' => 1,
        ]);
        Toastr::success('Task is Completed', 'Completed');
        return back();
    }

    public function deleteTask($slug){
        ToDo::where('slug', $slug)->delete();
        Toastr::error('Task is Deleted', 'Deleted');
        return back();
    }

    public function editTask($slug){
        $task = ToDo::where('slug', $slug)->first();
        return view('backend.edit_task', compact('task'));
    }

    public function viewTask($slug){
        $task = ToDo::where('slug', $slug)->first();
        return view('backend.view_task', compact('task'));
    }

    public function updateTask(Request $request){
        $this->validate($request,[
            'title' => 'required|max:255',
        ]);

        ToDo::where('slug', $request->slug)->where('user_id', Auth::user()->id)->update([
            'title' => $request->title,
            'description' => $request->ck_description,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Task is Updated', 'Success');
        return redirect('/my/todo/lists');
    }
}
