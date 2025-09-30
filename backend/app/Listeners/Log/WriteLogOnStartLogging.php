<?php

namespace App\Listeners\Log;

use App\Events\Log\StartLogging;
use App\Models\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WriteLogOnStartLogging
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StartLogging $event): void
    {
        Log::create([
            'model_name' => get_class($event->log),
            'event_name' => 'start logging',
            'old_fields' => null,
            'new_fields' => null,
        ]);
    }
}
