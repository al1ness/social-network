<?php

namespace App\Listeners\Log;

use App\Events\Log\CompletionLogging;
use App\Models\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WriteLogOnCompletionLogging
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
    public function handle(CompletionLogging $event): void
    {
        Log::create([
            'model_name' => get_class($event->log),
            'event_name' => 'completion logging',
            'old_fields' => null,
            'new_fields' => null,
        ]);
    }
}
