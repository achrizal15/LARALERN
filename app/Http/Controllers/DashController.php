<?php

namespace App\Http\Controllers;

use App\Models\UserLog;
use Illuminate\Http\Request;

class DashController extends Controller
{
    
    public function index(){
        $log_user=UserLog::latest()->with("user")->paginate(5)->withQueryString();
        return view('dashboard',["logs"=>$log_user]);
    }
}
