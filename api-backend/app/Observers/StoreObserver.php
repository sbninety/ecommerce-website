<?php

namespace App\Observers;

use App\Models\Store;

class StoreObserver
{
    /**
     * Handle the Store "created" event.
     */
    public function created(Store $store): void
    {
        $store->user()->create([
            'store_id' => $store->id,
            'email' => request()->email,
            'password' => bcrypt(request()->password)
        ]);
    }

    /**
     * Handle the Store "updated" event.
     */
    public function updated(Store $store): void
    {
        // $store->user()->update([
        //     'name' => request()->username,
        //     'gender' => request()->gender,
        //     'phone' => request()->phone
        // ]);
    }

    /**
     * Handle the Store "deleted" event.
     */
    public function deleted(Store $store): void
    {
        //
    }

    /**
     * Handle the Store "restored" event.
     */
    public function restored(Store $store): void
    {
        //
    }

    /**
     * Handle the Store "force deleted" event.
     */
    public function forceDeleted(Store $store): void
    {
        //
    }
}
