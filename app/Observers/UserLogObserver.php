<?php

namespace App\Observers;

use App\Models\UserLog;

class UserLogObserver
{
    /**
     * Handle the UserLog "created" event.
     *
     * @param  \App\Models\UserLog  $userLog
     * @return void
     */
    public function created(UserLog $userLog)
    {
        //
    }

    /**
     * Handle the UserLog "updated" event.
     *
     * @param  \App\Models\UserLog  $userLog
     * @return void
     */
    public function updated(UserLog $userLog)
    {
        //
    }

    /**
     * Handle the UserLog "deleted" event.
     *
     * @param  \App\Models\UserLog  $userLog
     * @return void
     */
    public function deleted(UserLog $userLog)
    {
        //
    }

    /**
     * Handle the UserLog "restored" event.
     *
     * @param  \App\Models\UserLog  $userLog
     * @return void
     */
    public function restored(UserLog $userLog)
    {
        //
    }

    /**
     * Handle the UserLog "force deleted" event.
     *
     * @param  \App\Models\UserLog  $userLog
     * @return void
     */
    public function forceDeleted(UserLog $userLog)
    {
        //
    }
}
