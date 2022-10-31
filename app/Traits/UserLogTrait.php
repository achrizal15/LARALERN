<?php

namespace App\Traits;

use App\Models\UserLog;

trait UserLogTrait
{
    /* 
     this function for create log action user. 
     */
    public function store_user_log($description, $action, $user = null)
    {
        $logs = UserLog::create([
            "user_id" => $user != null ? $user->id : auth()->user()->id,
            "description" => $description,
            "action" => $action
        ]);
        $duplicate = UserLog::where("user_id", $user != null ? $user->id : auth()->user()->id)
            ->where("created_at", date($logs->created_at))
            ->where("action", $logs->action)
            ->where("description", $logs->description)
            ->get();
        if (count($duplicate) > 1) {
            $duplicate[0]->delete();
        }
    }
}
