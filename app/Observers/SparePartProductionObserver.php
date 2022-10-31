<?php

namespace App\Observers;

use App\Models\SparePartProduction;
use App\Traits\UserLogTrait;
class SparePartProductionObserver
{
    use UserLogTrait;
    /**
     * Handle the SparePartProduction "created" event.
     *
     * @param  \App\Models\SparePartProduction  $sparePartProduction
     * @return void
     */
    public function created(SparePartProduction $sparePartProduction)
    {
    //    $this->store_user_log("Generating sparepart $sparePartProduction->serial_number","Create");
    }

    /**
     * Handle the SparePartProduction "updated" event.
     *
     * @param  \App\Models\SparePartProduction  $sparePartProduction
     * @return void
     */
    public function updated(SparePartProduction $sparePartProduction)
    {
        //
    }

    /**
     * Handle the SparePartProduction "deleted" event.
     *
     * @param  \App\Models\SparePartProduction  $sparePartProduction
     * @return void
     */
    public function deleted(SparePartProduction $sparePartProduction)
    {
        $this->store_user_log("Deleting sparepart $sparePartProduction->serial_number","Delete");
    }

    /**
     * Handle the SparePartProduction "restored" event.
     *
     * @param  \App\Models\SparePartProduction  $sparePartProduction
     * @return void
     */
    public function restored(SparePartProduction $sparePartProduction)
    {
        //
    }

    /**
     * Handle the SparePartProduction "force deleted" event.
     *
     * @param  \App\Models\SparePartProduction  $sparePartProduction
     * @return void
     */
    public function forceDeleted(SparePartProduction $sparePartProduction)
    {
        //
    }
}
