<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|min:6|max:15',
            'photo' => 'required|mimes:jpg,png,jpeg',
        ]);

        if($validate){
            $photo = $request->file('photo');
            $filename = Str::slug($request->title) . '-' . time() . '.' . $photo->getClientOriginalExtension();

            $photo->move(public_path('uploads/'), $filename);

            $task = new Task;
            $task->title = $request->title;
            $task->link = $filename;

            $task->save();
        }



        return redirect()->route('tasks.index')->with('status','added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validate = $request->validate([
            'title' => 'min:6|max:15',
            'photo' => 'mimes:jpg,png,jpeg',
        ]);

        $photo = $request->file('photo');

        if($validate){

            if($photo){
                $task->title = $request->title;

                File::delete('uploads/'.$task->link);

                $filename = Str::slug($request->title) . '-' . time() . '.' .$photo->getClientOriginalExtension();

                $photo->move(public_path('uploads/'), $filename);

                $task->link = $filename;
            }else{
                $task->title = $request->title;
            }


            $task->update();
        }
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {

        $name = $task->link;

        File::delete(public_path('uploads/'.$name));

        $task->delete();

        return redirect()->route('tasks.index');
    }

}
