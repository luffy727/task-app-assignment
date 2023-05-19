<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Todolist;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $todolists = Todolist::with(['tasks' => function ($query) {
            $query->orderBy('due_date')->orderBy('due_time');
        }])->get();

        // dd($todolists);
        return view('home', compact('todolists'));
    }
}
