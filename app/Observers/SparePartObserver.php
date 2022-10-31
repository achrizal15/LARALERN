<?php

namespace App\Observers;

use App\Models\SparePart;
use App\Traits\UserLogTrait;
class SparePartObserver
{
    use UserLogTrait;
    /**
     * Handle the SparePart "created" event.
     *
     * @param  \App\Models\SparePart  $sparePart
     * @return void
     */
    public function created(SparePart $sparePart)
    {
        $this->store_user_log("Created new sparepart the name is $sparePart->name","Create");
    }

    /**
     * Handle the SparePart "updated" event.
     *
     * @param  \App\Models\SparePart  $sparePart
     * @return void
     */
    public function updated(SparePart $sparePart)
    {
        $this->store_user_log("Updating sparepart $sparePart->serial_number","Update");
    }

    /**
     * Handle the SparePart "deleted" event.
     *
     * @param  \App\Models\SparePart  $sparePart
     * @return void
     */
    public function deleted(SparePart $sparePart)
    {
        $this->store_user_log("Deleting sparepart $sparePart->serial_number","Delete");
    }

    /**
     * Handle the SparePart "restored" event.
     *
     * @param  \App\Models\SparePart  $sparePart
     * @return void
     */
    public function restored(SparePart $sparePart)
    {
        //
    }

    /**
     * Handle the SparePart "force deleted" event.
     *
     * @param  \App\Models\SparePart  $sparePart
     * @return void
     */
    public function forceDeleted(SparePart $sparePart)
    {
        //
    }
}
