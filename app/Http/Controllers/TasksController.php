<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\User;

class TasksController extends Controller
{
    
    public function __construct(){
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $user = \Auth::user();
            $tasklists = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            
            $user->loadRelationshipCounts();
            
            return view('tasklists.index', [
                'user' => $user,
                'tasklists' => $tasklists
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $tasklist = new Task;
        
        return view('tasklists.create', [
            'tasklist' => $tasklist,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'content' => 'required|max:255',
            'status' => 'required|max:10',   
        ]);
        
        $request->user()->tasks()->create([
            'content' => $request->content,
            'status' => $request->status,
        ]);
        
        return redirect('/')->with('status', 'seccess!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \Auth::user();
        $tasklist = Task::findOrFail($id);
        
        if ($user->id == $tasklist->user_id) {
        
            return view('tasklists.show', [
                'user' => $user,
                'tasklist' => $tasklist,
            ]);
        
        } else {
            return redirect('/')->with('alert', 'error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $tasklist = Task::findOrFail($id);
        
        return view('tasklists.edit', [
            'tasklist' => $tasklist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'content' => 'required|max:255',
            'status' => 'required|max:10',   
        ]);
        
        $tasklist = Task::findOrFail($id);
        
        
        $tasklist->content = $request->content;
        $tasklist->status = $request->status;
        $tasklist->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasklist = Task::findOrFail($id);
        
        if (\Auth::id() === $tasklist->user_id) {
            $tasklist->delete();
        }
        
        return redirect('/')->with('alert', 'deleted!');
    }
}
