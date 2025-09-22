<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $userCount = User::count();
        $taskCount = Task::count();
         return view('home',compact('userCount','taskCount'));
    }
}
